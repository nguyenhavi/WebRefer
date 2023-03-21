<?php
require_once(ADMIN_PATH . 'controllers/base_controller.php');
require_once(ADMIN_PATH . 'models/Order.php');
require_once(ADMIN_PATH . 'models/User.php');

class OrdersController extends BaseController
{
  function __construct()
  {
    $this->folder = 'orders';
    $this->status = array(
      0 => 'Chưa xử lý',
      1 => 'Đang xử lý',
      2 => 'Đã xử lí',
      3 => 'Đã bị hủy'
    );
  }

  public function home()
  {
    $by = NULL;
    if (isset($_GET["by"])) {
      $by = $_GET["by"];
      if ($by == "new")
        $orders = Order::all(0);
      else if ($by == "process")
        $orders = Order::all(1);
      else if ($by == "complete")
        $orders = Order::all(2);
      else if ($by == "cancel")
        $orders = Order::all(3);
      else
        $orders = Order::all();
    }
    else
      $orders = Order::all();
    $data = array('orders' => $orders, "status" => $this->status);
    $this->render('home', $data);
  }

  public function cancelOrders()
  {
    $orders = Order::all(3);
    $data = array('orders' => $orders, "status" => $this->status);
    $this->render('home', $data);
  }

  public function view()
  {
    if (isset($_GET['order_id'])) {
      $order_id = intval($_GET['order_id']);
      $order_detail = Order::order_detail($order_id);
      $order = Order::order_by_id($order_id);
      $data = array('order_detail' => $order_detail, "status" => $this->status, "order" => $order);
      $this->render('view', $data);
    }else{
      header("location: ?controller=orders");
      exit();
    }
  }

  public function delete()
  {
    if (isset($_GET['order_id'])) {
      $id = (int)$_GET["order_id"];
      Order::order_delete($id);
      header("location: ?controller=orders");
      exit();
    }
    else{
      header("location: ?controller=orders");
      exit();
    }
  }

  public function updateStatus()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $order_id = intval($_POST["order_id"]);
      $status = intval($_POST["status"]);
      Order::updateOrderSatus($order_id, $status);
      if ($status === 1) {
        header("location: ?controller=orders&by=process");exit();
      } else if ($status === 2) {
        header("location: ?controller=orders&by=complete");exit();
      } else if ($status === 3) {
        header("location: ?controller=orders&by=cancel");exit();
      }else {
        header("location: ?controller=orders");exit();
      }
    }
  }



  public function error()
  {
    $this->render('error');
  }
}
