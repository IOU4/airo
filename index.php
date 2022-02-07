<!DOCTYPE html>
<html lang="en">
<head>
  <meta width=
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="./src/styles/main.css" media="all">
</head>
<body>
  <main>
  <?php require_once './src/Ticket.class.php'; 
    // var_dump(Ticket::get_rows());
    if(isset($_POST['cin'])) {
      $ticket = new Ticket($_POST['name'], $_POST['cin'], $_POST['departID'], $_POST['destinationID'], $_POST['departTime'], $_POST['avionID']);
      // $ticket->add_to_table();
      // $ticket->update_in_table('hit', 'ii112233', 2, 1, '2022-11-09T13:00', 1, $ticket->get_id());
      $ticket->delete_from_table();
    }
  ?>
    <h1>Welcome To The New Age : </h1>
    <form action="#" method="post">
      <input id="" type="text" name="name" placeholder="name" required>
      <input type="text" name='cin' placeholder="cin" required>
      <?php require_once './src/Airport.class.php'; ?>
      <?php $airports = Airport::get_rows(); ?>
      <select id="" name="departID">
        <option selected disabled>choisir votre depart</option>
        <?php foreach($airports as $item): ?>
          <option value="<?=$item['id']?>"><?=$item['city']?></option>
        <?php endforeach; ?>
      </select>
      <select id="" name="destinationID">
        <option selected disabled>choisir votre distination</option>
        <?php foreach($airports as $item): ?>
          <option value="<?=$item['id']?>"><?=$item['city']?></option>
        <?php endforeach; ?>
      </select>
      <input id="" type="datetime-local" name="departTime" placeholder="date de depart" required>
      <?php require_once './src/Avion.class.php'; ?>
      <?php $avions = Avion::get_rows(); ?>
      <select id="" name="avionID" required>
        <option selected disabled>choisir une avion</option>
        <?php foreach($avions as $item): ?>
          <option value="<?=$item['id']?>"><?=$item['name']?></option>
        <?php endforeach; ?>
      </select>
      <input type="submit" value="Reserver" class="submit">
    </form>
  </main>
</body>
</html>
