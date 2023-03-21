<?php
class Product {

  static function all($filter=NULL)
  {
    $conn= DB::getInstance();
    if(isset($filter) && $filter >= 1 && $filter <= 3)
      $sql = 'SELECT * FROM products WHERE type_id=?';
    else
      $sql = 'SELECT * FROM products';
    $stmt = $conn->prepare($sql);
    if(isset($filter) && $filter >= 1 && $filter <= 3)
      $stmt->bind_param("i",$filter);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }
  
  static function findByID($id)
  {
    $conn= DB::getInstance();

    $sql = 'SELECT * FROM products WHERE id=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    return $res->fetch_assoc();
  }

  static function deleteByID($id)
  {

    $product = Product::findByID($id);
    $image = PATH_URL_IMG_PRODUCT . $product['img1'];
    if (is_file($image)) {
        unlink($image);
    }
    $image2 = PATH_URL_IMG_PRODUCT . $product['img2'];
    if (is_file($image2)) {
        unlink($image2);
    }
    $image3 = PATH_URL_IMG_PRODUCT . $product['img3'];
    if (is_file($image3)) {
        unlink($image3);
    }
    $image4 = PATH_URL_IMG_PRODUCT . $product['img4'];
    if (is_file($image4)) {
        unlink($image4);
    }
    $conn= DB::getInstance();
    $sql = "DELETE FROM products WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }

  static function Update($data=array()) {
    $conn= DB::getInstance();
    $table='products';
    foreach ($data as $key => $value) {
        $value = escape($value);
        $values[] = "`$key`='$value'";
    }
    $id = intval($data['id']);
    if ($id > 0) {
        $sql = "UPDATE `$table` SET " . implode(',', $values) . " WHERE `id`='$id'";
 
    } else {
        $sql = "INSERT INTO `$table` SET " . implode(',', $values);
    }

    $conn->query($sql);


    $id = ($id > 0) ? $id : mysqli_insert_id($conn);
    return $id;
  }


  static function findByCategory() {
    
  }
}