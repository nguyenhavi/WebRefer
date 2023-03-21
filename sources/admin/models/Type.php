<?php
class Type {

  static function all()
  {
    $conn= DB::getInstance();

    $sql = 'SELECT * FROM types';

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();
       
    return $res;
  }
  
  static function findByID($id)
  {
    $conn= DB::getInstance();

    $sql = 'SELECT * FROM types WHERE id=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    return $res->fetch_assoc();
  }

  static function deleteByID($id)
  {

    $conn= DB::getInstance();
    $sql = "DELETE FROM types WHERE id=$id ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }

  static function Update($data=array()) {
    $conn= DB::getInstance();
    $table='types';
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

}