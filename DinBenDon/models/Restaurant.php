<?php
/**
*
*/
class Restaurant extends EasyORM {

  protected static $table = 'Restaurant';
  protected static $pk = array('rest_id' => 'restId');
  protected static $colums = array(
    'rest_name' => 'name',
    'rest_comment' => 'comment'
  );

  public static function listAll() {
    return self::listBy();
  }

  public function listMenu() {
    return Menu::listByRestId($this->restId);
  }

}
?>