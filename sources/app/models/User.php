<?php
class User
{

  static function all()
  {
    $conn = DB::getInstance();

    $sql = 'SELECT * FROM user';

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();

    return $res;
  }

  static function findByID($id)
  {

    $conn = DB::getInstance();

    $sql = 'SELECT * FROM user WHERE id=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    return $res->fetch_assoc();
  }

  static function Update($data = array())
  {
    $table = 'user';

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



  static function AddUser($data = array())
  {
    $table = 'user';

    foreach ($data as $key => $value) {
      $value = escape($value);
      $values[] = "`$key`='$value'";
    }

    $name = $data['username'];

    $conn = DB::getInstance();

    $sql = 'SELECT * FROM user WHERE username=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();

    if ($stmt->get_result()->fetch_assoc()) {
      return FALSE;
    } else {
      $sql = "INSERT INTO `$table` SET " . implode(',', $values);
      return DB::getInstance()->query($sql);
    }
  }
}