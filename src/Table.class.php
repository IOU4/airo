<?php
abstract class Table {
  protected $id;

  public static function get_rows() {
    $dbh = self::connect_to_db();
    $sql = "select * from ".static::TABLE.";";
    $statement = $dbh->prepare($sql);
    $statement->execute() or die($statement->errorCode());
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
    $statement = $dbh->prepare("select last_insert_id();");
    $statement->execute() or die($statement->errorCode());
    // get last inserted id;
    $this->id = $statement->fetch(PDO::FETCH_NUM)[0];
    echo "added successfully at id = $this->id";
  }
  public function delete_from_table() {
    if(!$this->id) return false;
    $dbh = self::connect_to_db();
    $statement = $dbh->prepare(static::DELETE_QUERY);
    $statement->execute([$this->id]) or die($statement->errorCode());
    return true;
  }
  public function get_id() {
    echo ($this->id) ? $this->id : 'not added to table yet';
  }
}
