<!DOCTYPE html>
<html lang="en">
<head>
  <meta width=
  <meta charset="UTF-8">
  <meta dece
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Airo</title>
  <link rel="stylesheet" href="./Views/styles/main.css" media="all">
</head>
<body>
  <main>
  <?php
  if(isset($_GET['tickets']))
    require_once "./Controllers/Ticket.controller.php";
  else 
    require_once "./Controllers/Form.controller.php";
  ?>
  </main>
</body>
</html>
