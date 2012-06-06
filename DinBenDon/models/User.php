<?php
/**
*
*/
class User extends EasyORM {

  protected static $table = 'User';
  protected static $pk = array('user_id' => 'uid');
  protected static $colums = array(
    'user_account' => 'account',
    'user_type' => 'type',
    'user_Fname' => 'firstName',
    'user_Lname' => 'lastName',
    'user_email' => 'email',
    'user_phone' => 'phone',
    'user_ext' => 'ext',
    'user_password' => 'password'
  );

  public function verify($password) {
    return !empty($this->uid) && (md5($password) == $this->password);
  }

  public static function findByAccount($account) {
    $r = User::listBy(array('user_account' => $account));
    return empty($r) ? null : $r[0];
  }
}
?>