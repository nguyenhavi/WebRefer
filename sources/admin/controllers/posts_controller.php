<?php
require_once(ADMIN_PATH.'controllers/base_controller.php');
require_once(ADMIN_PATH.'models/Post.php');
require_once(ADMIN_PATH.'models/PostType.php');
require_once(ADMIN_PATH.'models/User.php');


class PostsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'posts';
    $this->status = array(
      0=>"Chưa công khai",
      1=>"Công khai",
      2=>"Thùng rác"
    );
    // Lọc ra các trường filter theo slug của types
    $this->filter = array();
    $arr = PostType::all();
    foreach($arr as $el) {
      $this->filter[$el['slug']]=$el['type_name'];
    }
    // Lọc ra các loại post
    $this->types = PostType::all();
  }

  public function home()
  {
    if(isset($_GET['by'])) {
      $by = $_GET['by'];
      if(array_key_exists($by,$this->filter)) {
        $posts = Post::all($this->filter[$by]);
        $data = array('posts' => $posts, "status"=>$this->status);
        $this->render('home', $data);
      }
      else {
        $posts = Post::all();
        $data = array('posts' => $posts, "status"=>$this->status);
        $this->render('home', $data);
      }
    }else {
      $posts = Post::all();
      $data = array('posts' => $posts, "status"=>$this->status);
      $this->render('home', $data);
    }
  }

  public function status()
  {
    if(isset($_GET['by'])) {
      $by = $_GET['by'];
      if(array_key_exists($by,$this->status)) {
        $posts = Post::allByStatus($by);
        $data = array('posts' => $posts, "status"=>$this->status);
        $this->render('home', $data);
      }
      else {
        $posts = Post::all();
        $data = array('posts' => $posts, "status"=>$this->status);
        $this->render('home', $data);
      }
    }else {
      $posts = Post::all();
      $data = array('posts' => $posts, "status"=>$this->status);
      $this->render('home', $data);
    }
  }

  public function add()
  {
    $data = array("status"=>$this->status,"types"=>$this->types);
    $this->render('edit', $data);
  }

  public function edit()
  {
    if(isset($_GET['post_id'])) {
      $id = intval($_GET['post_id']);
      $post = Post::findByID($id);
      $data = array("post"=>$post,"status"=>$this->status,"types"=>$this->types);
      $this->render('edit', $data);
    }else {
      header("location: ?controller=posts");exit();
    }
  }

  public function delete() {
    if(isset($_GET['post_id'])) {
      $id = intval($_GET['post_id']);
      Post::deleteByID($id);
    }
    header("location: ?controller=posts");exit();
  }

  public function trash () {
    if(isset($_GET["post_id"])) {
      $id = intval($_GET["post_id"]);
      Post::updateOrderSatus($id,2);
    }
    header("location: ?controller=posts");exit();
  }

  public function publish() {
    if(isset($_GET["post_id"])) {
      $id = intval($_GET["post_id"]);
      Post::updateOrderSatus($id,1);
    }
    header("location: ?controller=posts");exit();
  }

  public function updatePost() {

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = escape($_POST['title']);
      if (strlen($_POST['slug']) >= 5) $slug = slug($_POST['slug']);
      else $slug = slug($name);

      $post = array(
          'id' => intval($_POST['post_id']),
          'title' => $name,
          'slug' => $slug,
          'para1' => ($_POST['para1']), //ckeditor
          'para2' => ($_POST['para2']), //ckeditor
          'date' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
          'status' => intval($_POST['status']),
          'type' => intval($_POST['type']),
          'sub_pic_quote' => ($_POST['sub_pic_quote'])
      );

      $post_id = Post::updatePost($post);
      //upload ảnh đại diện của post
      $image_name1 = slug($name) . '-' . $post_id . 'main_pic';
      $config1 = array(
          'name' => $image_name1,
          'upload_path'  => PATH_URL_IMG_BLOG_UP,
          'allowed_exts' => 'jpg|jpeg|png|gif',
      );

      $image1 = upload('main_pic', $config1); //$field = name of input

      //cập nhật ảnh mới lên database 
      if ($image1) {
          $post = array(
              'id' => $post_id,
              'main_pic' => $image1
          );
          Post::updatePost($post);
      }

      //upload ảnh phụ của post
      $image_name2 = slug($name) . '-' . $post_id . 'sub_pic';
      $config2 = array(
          'name' => $image_name2,
          'upload_path'  => PATH_URL_IMG_BLOG_UP,
          'allowed_exts' => 'jpg|jpeg|png|gif',
      );
      $image2 = upload('sub_pic', $config2); //$field = name of input
      //cập nhật ảnh mới lên database 
      if ($image2) {
          $post = array(
              'id' => $post_id,
              'sub_pic' => $image2
          );
          Post::updatePost($post);
      }
      //chuyển hướng nếu có cập nhật
      header('location: admin.php?controller=posts&action=home');    
      exit(); 
    }  
  }



}