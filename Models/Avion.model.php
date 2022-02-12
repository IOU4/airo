<?php
require_once './Models/Table.class.php';
class Avion extends Table {
  public $name;
  public $type;
  public $capacite;
  public $lieuDepart;
  public $lieuArrive;
  public $tempDepart;
  public $tempVol;

  const TABLE = 'Avions';
  protected const ADD_QUERY = "insert into ".self::TABLE."(name, type, capacite, lieuDepart, lieuArrive, tempDepart, tempVol) values (?, ?, ?, ?, ?, ?, ?)";
  protected const UPDATE_QUERY = 'update'.self::TABLE.'set name = ?, type = ?, capacite = ?, lieuDepart = ?, lieuArrive = ?, tempDepart = ?, tempVol = ? where id = ?';
  protected const DELETE_QUERY = "delet from ".self::TABLE."where id = ?";

  public function __construct($name, $type, $capacite, $lieuDepart, $tempDepart, $id = null) {
    $this->id = $id;
    $this->name = $name;
    $this->type = $type;
    $this->capacite = $capacite;
    $this->lieuDepart = $lieuDepart;
    $this->tempDepart = $tempDepart;
  } 

  protected function get_add_query_vars() {
    return [$this->name, $this->type, $this->capacite, $this->lieuDepart, $this->lieuArrive, $this->tempDepart, $this->tempVol];
  }
}
