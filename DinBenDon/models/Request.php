<?php

class Request extends EasyORM {

  protected static $table = 'Request';
  protected static $pk = array('req_id' => 'reqId');
  protected static $colums = array(
    'req_date' => 'date',
    'req_by' => 'by',
    'req_restaurant' => 'restId',
    'req_comment' => 'comment'
  );

  protected static function getValuesStr() {
    return 'DATE(?), ?, ?, ?';
  }

  public function getRestaurant() {
    return Restaurant::find($this->restId);
  }

  public static function listByDate($date) {
    return Request::listBy(array('req_date' => $date));
  }

  public function getUser() {
    return User::find($this->by);
  }

  public function getReservations() {
    return Reservation::listBy(array('resv_request' => $this->reqId));
  }

  public static function delete($id) {
    Reservation::deleteBy(array('resv_request' => $id));
    return parent::delete($id);
  }

  public function changeIssuer($newUid) {
    return $this->updateBy(array('req_by' => $newUid), $this->reqId);
  }

}
?>