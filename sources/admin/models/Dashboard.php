<?php
class Dashboard
{

  static function all()
  {
    $db = DB::getInstance();
    $sql = 'SELECT * FROM user';
    $res = $db->query($sql);
    return $res;
  }
  
  static function find($id)
  {

  }

  static function findByCategory() {
    
  }
}