<?php
/**
*
*/

abstract class EasyORM {

  public function insert() {
    $sql = sprintf('INSERT INTO %s(%s) VALUES (%s)', static::$table, static::getColumsStr(), static::getValuesStr());
    $stmt = Database::prepare($sql);
    $stmt->execute($this->getValues());
    return Database::lastInsertId();
  }

  public static function listBy($what = null) {
    $sql = sprintf('SELECT %s, %s FROM %s', key(static::$pk), static::getColumsStr(), static::$table);
    if(isset($what))
      $sql .= ' WHERE '.static::getPairStr(array_keys($what), ' AND ');

    $stmt = Database::prepare($sql);
    $params = empty($what) ? null : array_values($what);
    $stmt->execute($params);
    $result = array();
    $pkk = key(static::$pk);
    $pkv = current(static::$pk);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $obj = new static;
      $obj->$pkv = $row[$pkk];
      foreach (static::$colums as $k => $v)
        $obj->$v = $row[$k];
      array_push($result, $obj);
    }
    return $result;
  }

  public static function find($id) {
    $r = static::listBy(array(key(static::$pk) => $id));
    return empty($r) ? null : $r[0];
  }

  public function update() {
    $pkk = key(static::$pk);
    $pkv = current(static::$pk);
    $sql = sprintf('UPDATE %s SET %s WHERE %s = %s', static::$table, getPairStr(array_keys($colums), ','), $pkk, $this->$pkv);
    $stmt = Database::prepare($sql);
    return $stmt->execute($this->getValues());
  }

  public function updateBy($what, $id) {
    $pkk = key(static::$pk);
    $sql = sprintf('UPDATE %s SET %s WHERE %s = %s', static::$table, static::getPairStr(array_keys($what), ','), $pkk, intval($id));
    $stmt = Database::prepare($sql);
    return $stmt->execute(array_values($what));
  }

  public static function delete($id) {
    $pkk = key(static::$pk);
    $sql = sprintf('DELETE FROM %s WHERE %s = ?', static::$table, $pkk);
    $stmt = Database::prepare($sql);
    return $stmt->execute(array($id));
  }

  public static function deleteBy($what) {
    $sql = sprintf('DELETE FROM %s WHERE %s', static::$table, static::getPairStr(array_keys($what), ' AND '));
    $stmt = Database::prepare($sql);
    $params = empty($what) ? null : array_values($what);
    return $stmt->execute($params);
  }

  // helping function

  protected static function getColumsStr() {
    return implode(',', array_keys(static::$colums));
  }

  protected static function getValuesStr() {
    return implode(',', array_fill(0, count(static::$colums), '?'));
  }

  protected static function getPairStr($cols, $glue) {
    $arr = array();
    foreach ($cols as $c)
      array_push($arr, "$c = ?");
    return implode($glue, $arr);
  }

  protected function getValues() {
    $values = array();
    foreach (array_values(static::$colums) as $v)
      array_push($values, $this->$v);
    return $values;
  }

}
?>