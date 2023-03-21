<?php
class User
{

  static function all()
  {
    $conn= DB::getInstance();

    $sql = 'SELECT * FROM user';

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();
       
    return $res;
  }
  
  static function findByID($id)
  {

    $conn= DB::getInstance();

    $sql = 'SELECT * FROM user WHERE id=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    return $res->fetch_assoc();
  }

  static function deleteByID($id)
  {
    $conn= DB::getInstance();
    $sql = "DELETE FROM user WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }

  static function Update($data=array()) {
    $table='user';

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

  static function BannedByID($id, $bannedate,$editTime) {
    $conn= DB::getInstance();
    $sql = "UPDATE user SET banned=?, editTime=? WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi",$bannedate,$editTime,$id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res;
  }
}