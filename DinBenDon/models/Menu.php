<?php
class Menu extends EasyORM {

  protected static $table = 'Menu';
  protected static $pk = array('menu_id' => 'menuId');
  protected static $colums = array(
    'meal_name' => 'name',
    'rest_id' => 'restId',
    'meal_price' => 'price',
  );

  public static function listByRestId($restId) {
    return Menu::listBy(array('rest_id' => intval($restId)));
  }

}
?>