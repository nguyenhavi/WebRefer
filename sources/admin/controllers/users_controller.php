<?php
require_once(ADMIN_PATH.'controllers/base_controller.php');
require_once(ADMIN_PATH.'models/User.php');
class UsersController extends BaseController
{
  function __construct()
  {
    $this->folder = 'users';
  }

  public function home()
  {
    $users = User::all();
    $data = array('users' => $users);
    $this->render('home', $data);
  }

  public function delete() {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST["id"];
        $res = User::deleteByID($id);
        if(!$res) {
          echo json_encode(array('statusCode'=>200));
        } else {
            echo json_encode(array('statusCode'=>400,
                                    'err' => "Error deleting record: ".DB::getInstance()->error.$res,            
            ));
        }
        
    }  
  }

  public function banned() {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST["id"];
        $bannedate = date($_POST["bandate"]);

        if ($_POST['id'] <> 0) $editTime = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
        else $editTime = '0000-00-00 00:00:00';

        $res = User::BannedByID($id,$bannedate, $editTime);
        if(!$res) {
          echo json_encode(array('statusCode'=>200));
        } else {
            echo json_encode(array('statusCode'=>400,
                                    'err' => "Error deleting record: ".DB::getInstance()->error.$res,            
            ));
        }
        
    }  
  }

    public function edit() {
    if(isset($_GET['id'])) {
      $user = User::findByID($_GET['id']);
      $user_info = array('user_info'=>$user);
      $this->render('edit',$user_info);
    } else {
      header("location: ?controller=users");exit();
    }
  }

  public function updateUser() {
    if($_SERVER["REQUEST_METHOD"] == "POST") {

      if ($_POST['user_id'] <> 0) $editTime = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
      else $editTime = '0000-00-00 00:00:00';
      // Check role 
      if (isset($_POST['role']) && $_SESSION['user']['role'] == 1) $role = $_POST['role'];
      else $role = $_SESSION['user']['role'];
  
      $user_edit = array(
          'id' => intval($_POST['user_id']),
          'email' => escape($_POST['email']),
          'username' => escape($_POST['username']),
          'fullname' => escape($_POST['fullname']),
          'address' => escape($_POST['address']),
          'phone_num' => escape($_POST['phone_num']),
          'editTime' => $editTime,
          'role' => $role
      );

      // Check Email
      $email_check = addslashes($_POST['email']);
      $id_check = intval($_POST['user_id']);
      if (
        mysqli_num_rows(DB::getInstance()->query("SELECT email FROM user WHERE email='$email_check'")) != 0 &&
        mysqli_num_rows(DB::getInstance()->query("SELECT email FROM user WHERE id='$id_check' AND email='$email_check'")) <> 1
      ){
          echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
          require('?controller=users&action=home');
          exit;
      } else {
          // Update User Info
          $user_id =  User::Update($user_edit);
          
          // Save Avatar
          $avatar_name = 'avatar-user' . $user_id . '-' . slug($_POST['username']);

          $config = array(
              'name' => $avatar_name,
              'upload_path'  => PATH_URL_IMG_UP,
              'allowed_exts' => 'jpg|jpeg|png|gif',
          );


          $avatar = upload('avatar', $config);
          //cập nhật ảnh mới
          if ($avatar) {
              $user_edit = array(
                  'id' => $user_id,
                  'avatar' => $avatar
              );
              User::Update($user_edit);
          }
          header('Location: admin.php?controller=users&action=home');
          exit();
      }
    }  
  }

  public function error()
  {
    $this->render('error');
  }

}