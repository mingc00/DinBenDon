<?php
class Reservation extends EasyORM {

  protected static $table = 'Reservation';
  protected static $pk = array('resv_id' => 'resvId');
  protected static $colums = array(
    'resv_timestamp' => 'timestamp',
    'resv_by' => 'by',
    'resv_request' => 'reqId',
    'resv_menu' => 'menu'
  );

  public function getUser() {
    return User::find($this->by);
  }

  public function getMenu() {
    return Menu::find($this->menu);
  }

  public static function listByUser($uid) {
    return Reservation::listBy(array('resv_by' => $uid));
  }

  public function getRequest() {
    return Request::find($this->reqId);
  }

}
?>