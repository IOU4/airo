<?php 
require_once './Models/Ticket.model.php';
class TicketController {
  static function load() {
    $tickets = Ticket::get_rows();
    include './Views/Tickets.view.php';
  }
  static function delete($id) {
    Ticket::delete_from_table($id);
  }
}

if(isset($_GET['delete'])){
  TicketController::delete($_GET['id']);
  echo "<script>alert('delted successfully at id = ".$_GET['id']."')</script>";
}

if(isset($_GET['tickets']))
  TicketController::load();
