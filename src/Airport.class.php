<?php
require_once './src/Table.class.php';
class Airport extends Table {
  protected $airport;
  protected $city;
  protected $country;
  protected $Distance;

  protected const TABLE = 'Airports';
  protected const ADD_QUERY = 'insert into '.self::TABLE.'(airport, city, country, Distance) values(?, ?, ?, ?);';
  protected const DELETE_QUERY = 'delete from '.self::TABLE.'where id = ?;';
  
  public function __construct($airport, $city, $country, $Distance) {
    $this->airport = $airport; 
    $this->city = $city; 
    $this->country = $country; 
    $this->Distance = $Distance; 
  }
  protected function get_add_query_vars() {
    return [$this->airport, $this->city, $this->country, $this->Distance];
  }
}
