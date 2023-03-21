<?php
require_once(ADMIN_PATH . 'controllers/base_controller.php');
require_once(ADMIN_PATH . 'models/User.php');
require_once(ADMIN_PATH . 'models/Product.php');
require_once(ADMIN_PATH . 'models/Order.php');
require_once(ADMIN_PATH . 'models/Post.php');

class AdminController extends BaseController
{
  function __construct()
  {
    $this->folder = 'admin';
    $this->status = array(
      0 => 'Chưa xử lý',
      1 => 'Đang xử lý',
      2 => 'Đã xử lí',
      3 => 'Đã bị hủy'
    );
    $this->post_status = array(
      0=>"Chưa công khai",
      1=>"Công khai",
      2=>"Thùng rác"
    );
  }

  public function home()
  {
    $users_res = User::all();
    $products = Product::all(2);
    $orders = Order::all(0);
    $orders_complete = Order::all(2);
    $posts = Post::all();

    $n_new_orders = $orders->num_rows;
    $n_new_products = $products->num_rows;
    $revenue = 0;
    foreach($orders_complete as $order) {
      $revenue += $order["cart_total"];
    }
    
    $data = array(
      'n_new_orders' => $n_new_orders,
      'n_new_products' => $n_new_products,
      'revenue' => $revenue,
      'users' => $users_res,
      'products' => $products,
      "orders" => $orders,
      "status" => $this->status,
      "posts" => $posts,
      "post_status" => $this->post_status,
    );
    $this->render('home', $data);
  }

  public function error()
  {
    $this->render('error');
  }
}
