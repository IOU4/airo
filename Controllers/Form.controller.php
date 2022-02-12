<?php 
include_once './Controllers/Ticket.controller.php';
class Form {
  protected $avions;
  protected $airports;
  function __construct($avions, $airports) {
    $this->avions = $avions; 
    $this->airports = $airports; 
  } 
  public function load() {
    $airports = $this->airports; 
    $avions = $this->avions; 
    include './Views/Form.view.php';
  } 
  public function insert($data) {
    $ticket = new Ticket(...array_values($data));
    $id = $ticket->add_to_table();
    if($id) 
      echo "<script>alert('added successfully at id = ".$id."')</script>";
    else 
      echo "<script>alert('an error has occured')</script>";
  }
}

include_once './Models/Avion.model.php';
include_once './Models/Airport.model.php';

$form = new Form(Avion::get_rows(), Airport::get_rows());

if(isset($_POST['cin']))
  $form->insert($_POST);

$form->load();

