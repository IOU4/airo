<h1>Tickets</h1>
<div class="tickets">
  <?php foreach($tickets as $ticket):?>
  <div>
    <span><strong>name:</strong> <?=$ticket['travler']?></span>
    <span><strong>cin:</strong>  <?=$ticket['cin']?></span>
    <span><strong>Depart:</strong> <?=$ticket['departID']?></span>
    <span><strong>Destination:</strong> <?=$ticket['destinationID']?></span>
    <span><strong>departTime:</strong> <?=$ticket['departTime']?></span>
    <span><strong>Avion:</strong> <?=$ticket['avionID']?></span>
    <span><a href="?tickets&delete&id=<?=$ticket['id']?>">delete</a> <a href="?tickets&update&id=<?=$ticket['id']?>">update</a></span>
  </div>
  <?php endforeach;?>
</div>
<form action="">
<a class="submit" href="./"><div>Add Ticket</div></a>
</form>
