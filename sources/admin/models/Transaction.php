<?php
class Transaction
{

  static function all()
  {
    $db = DB::getInstance();
    $sql = 'SELECT * FROM transaction';
    $res = $db->query($sql);
    return $res;
  }
  
  static function find($id)
  {

  }

  static function findByCategory() {
    
  }
}