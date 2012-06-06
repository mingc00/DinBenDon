<?php
/**
*
*/
class Database
{
  private static $link = null;

  private static function getLink() {
    if(!self::$link) {
      define('DB','HOST');
      define('USERNAME', 'USERNAME');
      define('PASSWORD', 'PWD');
      self::$link = new PDO(DB, USERNAME, PASSWORD);
    }
    return self::$link;
  }

  public static function __callStatic($name, $args) {
    $callback = array(self::getLink(), $name);
    return call_user_func_array($callback, $args);
  }

}
?>