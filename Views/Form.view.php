<h1>Welcome To The New Age : </h1>
<form action="./" method="post">
  <input id="" type="text" name="name" placeholder="name" required>
  <input type="text" name='cin' placeholder="cin" required>
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
  <select id="" name="avionID" required>
    <option selected disabled>choisir une avion</option>
    <?php foreach($avions as $item): ?>
      <option value="<?=$item['id']?>"><?=$item['name']?></option>
    <?php endforeach; ?>
  </select>
  <input type="submit" value="Reserver" class="submit">
  <a href="?tickets"><div>view tickets</div></a>
</form>
