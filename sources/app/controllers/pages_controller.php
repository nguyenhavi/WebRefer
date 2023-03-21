<?php
require_once('base_controller.php');
require_once(USER_PATH . 'models/User.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $this->render('home');
  }

  public function register()
  {
    if (isset($_SESSION["user"])) {
      header('Location: /pages');
      exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re_password'])) {
        if ($_POST['password'] === $_POST['re_password']) {
          $user_data = array(
            'username' => escape($_POST['username']),
            'fullname' => escape($_POST['fullname']),
            'password' => escape($_POST['password'])
          );

          $status = User::AddUser($user_data);

          if ($status === TRUE) {
            header('Location: /pages/login');
            exit();
          } else {
            echo "<script>alert('Tên tài khoản đã tồn tại')</script>";
          }

        } else {
          echo '<script>alert("Mật khẩu không khớp");</script>';
        }
      } else {
        echo '<script>alert("Xin hãy nhập đầy đủ thông tin")</script>';
      }
    }

    $this->render('register', [], 'form');

  }

  public function login()
  {
    if (isset($_SESSION["user"])) {
      header('Location: /pages');
      exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['username']) && isset($_POST['password'])) {

        $res = login($_POST['username'], $_POST['password']);

        if ($res) {
          if (!isBanned($res["banned"])) {
            $_SESSION["user"] = $res;
            header('Location: /pages');
            exit();
          } else {
            header("location: /pages/page_403");
            exit();
          }
        } else {
          echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu")</script>';
        }

      } else {
        echo '<script>alert("Xin hãy nhập tên đăng nhập và mật khẩu")</script>';
      }
    }

    $this->render('login', [], 'form');
  }

  public function user()
  {
    if (isset($_SESSION["user"])) {
      $user = User::findByID($_SESSION["user"]["id"]);
      $data = array("user"=>$user);
      $this->render('user', $data);
    } else {
      header('Location: /pages/login');
      exit();
    }
  }
  public function about()
  {
    $this->render('about');
  }
  public function contact()
  {
    $this->render('contact');
  }

  public function page_404()
  {
    $this->render('page_404');
  }

  public function page_403()
  {
    $this->render('page_403');
  }
  public function logout()
  {
    unset($_SESSION["user"]);
    $_SESSION['cart'] = array();
    header("location: /");
    exit();
  }
}
