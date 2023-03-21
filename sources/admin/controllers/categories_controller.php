<?php
require_once(ADMIN_PATH.'controllers/base_controller.php');
require_once(ADMIN_PATH.'models/Category.php');
require_once(ADMIN_PATH.'models/Type.php');
class CategoriesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'categories';
  }

  public function home()
  {
    $categories = Category::all();
    $data = array("categories"=>$categories);
    $this->render('home', $data);
  }

  public function delete() {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = intval($_POST["id"]);
        if(!Category::deleteByID($id)) {
            echo json_encode(array('statusCode'=>200));
        } else {
            echo json_encode(array('statusCode'=>400,
                                    'err' => "Error deleting record: ".DB::getInstance()->error,            
            ));
        }
    }  
  }
  
  public function edit() {
    if(isset($_GET['id'])) {
      $category = Category::findByID($_GET['id']);
      $category_info = array('category'=>$category);
      $this->render('edit',$category_info);
    }  else {
      header("location: ?controller=categories");
      exit();
    }
  }

  public function add() {
    $types = Type::all();
    $categories = Category::all();
    $product_info = array('types'=> $types, "categories"=>$categories);
    $this->render('edit',$product_info);  
  }

  public function updateCategory() {

    if($_SERVER["REQUEST_METHOD"] == "POST") {
  
      $name = escape($_POST['name']);
      if (strlen($_POST['slug']) >= 5) $slug = slug($_POST['slug']);
      else $slug = slug($name);
  
      $category = array(
          'id' => intval($_POST['category_id']),
          'category_name' => $name,
          'slug' => $slug,
      );
      $category_id = Category::Update($category);

      //chuyển hướng nếu có cập nhật
      header('location: admin.php?controller=categories&action=home');    
      exit(); 
    }  
  }

  public function error()
  {
    $this->render('error');
  }

}