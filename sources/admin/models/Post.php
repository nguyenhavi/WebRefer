<?php
class Post
{

  static function all($filter = NULL)
  {
    $conn = DB::getInstance();
    if (isset($filter))
      $sql = 'SELECT blog.id,main_pic,type,title,date,para1, sub_pic,para2,sub_pic_quote,status,blog.slug,type_name 
              FROM blog INNER JOIN blog_types on blog.type=blog_types.id 
              WHERE type_name=?';
    else
      $sql = 'SELECT blog.id,main_pic,type,title,date,para1, sub_pic,para2,sub_pic_quote,status,blog.slug,type_name 
              FROM blog INNER JOIN blog_types on blog.type=blog_types.id';
    $stmt = $conn->prepare($sql);
    if (isset($filter))
      $stmt->bind_param("s", $filter);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }

  static function allByStatus($filter)
  {
    $conn = DB::getInstance();
    $sql = 'SELECT blog.id,main_pic,type,title,date,para1, sub_pic,para2,sub_pic_quote,status,blog.slug,type_name 
            FROM blog INNER JOIN blog_types on blog.type=blog_types.id 
            WHERE status=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $filter);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }

  static function findByID($id)
  {
    $conn = DB::getInstance();

    $sql = 'SELECT blog.id,main_pic,type,title,date,para1, sub_pic,para2,sub_pic_quote,status,blog.slug,type_name 
            FROM blog INNER JOIN blog_types on blog.type=blog_types.id 
            WHERE blog.id=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    return $res->fetch_assoc();
  }

  static function updatePost($data = array())
  {
      $table='blog';
  
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
      DB::getInstance()->query($sql);
      $id = ($id > 0) ? $id : mysqli_insert_id(DB::getInstance());
      return $id;
  }
  static function updateOrderSatus($post_id, $status) {
    $conn = DB::getInstance();   
    $sql = "UPDATE blog SET status=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$status, $post_id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }
  static function deleteByID($post_id) {
    $conn = DB::getInstance();   
    $sql = "DELETE FROM blog WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$post_id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }
}
