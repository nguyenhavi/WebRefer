<?php
class DB
{
  private static $instance = NULl;
  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      // Root
      // $servername = "localhost";
      // $username = "roots";
      // $password = "";
      // $dbname = "fashion";

      // MyDB
      // $servername = "localhost";
      // $username = "david";
      // $password = "51WXHZC[r7t4Kw8I";
      // $dbname = "fashion";

      //Docker
      $servername = "db";
      $username = "david";
      $password = "51WXHZC[r7t4Kw8I";
      $dbname = "fashion";


      self::$instance = new mysqli($servername, $username, $password, $dbname);
      if (self::$instance->connect_error) {
        die("Connection failed: " . self::$instance->connect_error);
      }
    }
    return self::$instance;
  }
}