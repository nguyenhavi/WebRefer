<?php
class Order {

  static function all($filter=null)
  {
    $conn= DB::getInstance();
    if(isset($filter) && $filter >= 0 && $filter <= 3)
      $sql = 'SELECT * FROM orders WHERE status=?';
    else
      $sql = 'SELECT * FROM orders';
    $stmt = $conn->prepare($sql);
    if(isset($filter) && $filter >= 0 && $filter <= 3)
      $stmt->bind_param("i",$filter);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }
  static function order_detail($order_id)
  {
      $conn = DB::getInstance();
      $sql = "SELECT products.id, products.name, products.img1, products.price ,products.type_id, products.percentoff, products.saleoff, order_detail.quantity, products.slug
        FROM order_detail
        INNER JOIN products ON products.id=order_detail.product_id
        WHERE order_detail.order_id=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i",$order_id);
      $stmt->execute();
      $res = $stmt->get_result();
      return $res;
  }
  static function order_by_id($order_id)
  {
      $conn = DB::getInstance();
      $sql = "SELECT *
        FROM orders
        WHERE orders.id=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i",$order_id);
      $stmt->execute();
      $res = $stmt->get_result();
      return $res->fetch_assoc();
  }

  static function order_delete($order_id){
    $conn = DB::getInstance();   
    $sql1 = "DELETE FROM orders WHERE id=?";
    $sql2 = "DELETE FROM order_detail WHERE order_id=?";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("i",$order_id);
    $stmt->execute();
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("i",$order_id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }
  // 1 : Complete, 2: Order_inprocess
  static function updateOrderSatus($order_id, $status) {
    $conn = DB::getInstance();   
    $sql = "UPDATE orders SET status=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$status, $order_id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }
}