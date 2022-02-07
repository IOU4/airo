<?php 
require_once './src/Table.class.php';
class Ticket extends Table{
  protected $travler;
  protected $cin;
  protected $departID;
  protected $destinationID;
  protected $departTime;
  protected $avionID;

  const TABLE = 'Tickets';
  protected const ADD_QUERY = "insert into ".self::TABLE."(travler, cin, departID, destinationID, departTime, avionID) values (?, ?, ?, ?, ?, ?)";
  protected const DELETE_QUERY = "delete from ".self::TABLE." where id = ?";
  
  public function __construct($travler, $cin, $departID, $destinationID, $time, $avionID) {
    $this->id = null;
    $this->travler = $travler;
    $this->cin = $cin;
    $this->departID = $departID;
    $this->destinationID = $destinationID;
    $this->departTime = $time;
    $this->avionID = $avionID;
  }
  public function __destruct() {
    echo "deleted at id = $this->id";
  }
  protected function get_add_query_vars(){
    return [$this->travler, $this->cin, $this->departID, $this->destinationID, $this->departTime, $this->avionID];
  }
}
