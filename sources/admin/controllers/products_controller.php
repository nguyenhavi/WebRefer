<?php
require_once(ADMIN_PATH.'controllers/base_controller.php');
require_once(ADMIN_PATH.'models/Product.php');
require_once(ADMIN_PATH.'models/Category.php');
require_once(ADMIN_PATH.'models/Type.php');
class ProductsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'products';
  }

  public function home()
  {
    if (isset($_GET["by"])) {
      $by = $_GET["by"];
      if ($by == "hot")
        $products = Product::all(1);
      else if ($by == "new")
        $products = Product::all(2);
      else if ($by == "sale")
        $products = Product::all(3);
      else
        $products = Product::all();
    }
    else
      $products = Product::all();
    $data = array("products"=>$products);
    $this->render('home', $data);
  }

  public function delete() {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST["id"];
        if(!Product::deleteByID($id)) {
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
      $product = Product::findByID($_GET['id']);
      $types = Type::all();
      $categories = Category::all();
      $product_info = array('product'=>$product, 'types'=> $types, "categories"=>$categories);
      $this->render('edit',$product_info);
    }  else {
      header("location: ?controller=products");exit();
    }
  }

  public function add() {
    $types = Type::all();
    $categories = Category::all();
    $product_info = array('types'=> $types, "categories"=>$categories);
    $this->render('edit',$product_info);  
  }

  public function updateProduct() {

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['editby'])) $editby = $_POST['editby'];
      else $editby = NULL;
  
      if ($_POST['product_id'] <> 0) $editDate = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
      else $editDate = '0000-00-00 00:00:00';
  
      if ($_POST['createdate'] == NULL || $_POST['createdate'] == 'dd/mm/yyyy') $createDate = date('Y-m-d H:i:s', time() + 7 * 3600);
      else $createDate = $_POST['createdate'];
  
      $name = escape($_POST['name']);
      if (strlen($_POST['slug']) >= 5) $slug = slug($_POST['slug']);
      else $slug = slug($name);
  
      $product = array(
          'id' => intval($_POST['product_id']),
          'category_id' => intval($_POST['category_id']),
          'name' => $name,
          'slug' => $slug,
          'size' => escape($_POST['size']),
          'type_id' => intval($_POST['type_id']),
          'price' => intval($_POST['price']),
          'color' => escape($_POST['color']),
          'material' => escape($_POST['material']),
          'createDate' => $createDate,
          'saleoff' => intval($_POST['status']),
          'percentoff' => intval($_POST['percent_off']),
          'totalView' => intval($_POST['totalview']),
          'description' => ($_POST['description']),
          'detail' => ($_POST['detail']),
          'createBy' => escape($_POST['createby']),
          'editBy' => escape($editby),
          'editDate' => $editDate
      );
      $product_id = Product::Update($product);
      //upload ảnh 1 của product
      $image_name1 = $slug . '-' . $product_id . 'img1';
      $config1 = array(
          'name' => $image_name1,
          'upload_path'  => PATH_URL_IMG_PRODUCT_UP,
          'allowed_exts' => 'jpg|jpeg|png|gif',
      );
      $image1 = upload('img1', $config1);
      //cập nhật ảnh mới lên database 
      if ($image1) {
          $product = array(
              'id' => $product_id,
              'img1' => $image1
          );
         Product::Update($product);
      }
      //upload ảnh 2 của product
      $image_name2 = $slug . '-' . $product_id . 'img2';
      $config2 = array(
          'name' => $image_name2,
          'upload_path'  => PATH_URL_IMG_PRODUCT_UP,
          'allowed_exts' => 'jpg|jpeg|png|gif',
      );
      $image2 = upload('img2', $config2);
      //cập nhật ảnh mới lên database
      if ($image2) {
          $product = array(
              'id' => $product_id,
              'img2' => $image2
          );
         Product::Update($product);
      }
      //upload ảnh 3 của product
      $image_name3 = $slug . '-' . $product_id . 'img3';
      $config3 = array(
          'name' => $image_name3,
          'upload_path'  => PATH_URL_IMG_PRODUCT_UP,
          'allowed_exts' => 'jpg|jpeg|png|gif',
      );
      $image3 = upload('img3', $config3);
      //cập nhật ảnh mới lên database 
      if ($image3) {
          $product = array(
              'id' => $product_id,
              'img3' => $image3
          );
         Product::Update($product);
      }
      //upload ảnh 4 của product
      $image_name4 = $slug . '-' . $product_id . 'img4';
      $config4 = array(
          'name' => $image_name4,
          'upload_path'  => PATH_URL_IMG_PRODUCT_UP,
          'allowed_exts' => 'jpg|jpeg|png|gif',
      );
      $image4 = upload('img4', $config4);
      //cập nhật ảnh mới lên database 
      if ($image4) {
          $product = array(
              'id' => $product_id,
              'img4' => $image4
          );
         Product::Update($product);
      }
      //chuyển hướng nếu có cập nhật
      header('location: admin.php?controller=products&action=home');     
      exit();
    }  
  }

  public function error()
  {
    $this->render('error');
  }

}