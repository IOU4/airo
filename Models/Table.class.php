<?php
abstract class Table {
  protected $id;

  public static function get_rows() {
    $dbh = self::connect_to_db();
    $sql = "select * from ".static::TABLE.";";
    $statement = $dbh->query($sql) or die($statement->errorCode());
    $resutl = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $resutl;
  }

  protected static function connect_to_db () {
    $dsn = 'mysql:dbname=Airo;host=127.0.0.1';
    $user = 'root';
    $pass = 'emad';
    $dbh = new PDO($dsn, $user, $pass);
    return $dbh;
  }

  abstract protected function get_add_query_vars();

  public function add_to_table() {
    $dbh = self::connect_to_db();
    $statement = $dbh->prepare(static::ADD_QUERY);
    $statement->execute($this->get_add_query_vars()) or die($statement->errorCode());
    // get last inserted id;
    $statement = $dbh->prepare("select last_insert_id();");
    $statement->execute() or die($statement->errorCode());
    $this->id = $statement->fetch(PDO::FETCH_NUM)[0];
    return $this->id;
  }
  public static function delete_from_table($id) {
    $dbh = self::connect_to_db();
    $statement = $dbh->prepare(static::DELETE_QUERY);
    $statement->execute([$id]) or die($statement->errorCode());
  }
  // abstract protected function get_update_query_vars();
  public function update_in_table() {
    $class_vars = get_class_vars(get_class($this));
    $passed_vars = func_get_args();
    if(count($class_vars) != func_num_args()) die("parametre number doesn't match ".count($class_vars)." != ".func_num_args());
    $dbh = self::connect_to_db(); 
    $statement = $dbh->prepare(static::UPDATE_QUERY);
    $statement->execute($passed_vars) or die($statement->errorCode());
  }
  public function get_id() {
    return $this->id;
  }
}
