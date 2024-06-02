<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/components/components.css">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/cercaNutrizionista.css">
  <title>Cerca Nutrizionista</title>
</head>

<body>
  <?php include ("../template/header/header.html");
  require ("../bootstrap.php");
  $id=$_SESSION["id"];
  require ("../nutrizionista.php"); ?>
  <main>
    <form action="" method="post">
      <h1>Filtra Risultati</h1>
      <div class="city">
        <label for="city">Città</label>
        <input class="txt" type="text" id="city">
      </div>
      <div class="cap">
        <label for="cap">Cap</label>
        <input class="txt" type="text" id="cap">
      </div>
      <div class="specialization">
        <label for="specialization">Specializzazione</label>
        <input class="txt" type="text" id="specialization">
      </div>
      <button class="btn">Applica Filtri</button>
    </form>
    <?php foreach($templateparams["allNutrizionisti"] as $nutrizionista): ?>
    <div data-id="<?php echo $nutrizionista["IDNutrizionista"]; ?>" class="result">
      <ul>
        <li>ID: <?php echo $nutrizionista["IDNutrizionista"]; ?></li>
        <li><?php echo $nutrizionista["Nome"], " ", $nutrizionista["Cognome"]; ?></li>
        <li>Città: <?php echo $nutrizionista["Citta"];?></li>
        <li>CAP: <?php echo $nutrizionista["CAP"]; ?></li>
        <li>Qualifica: <?php echo $nutrizionista["Titolo"]; ?></li>
      </ul>
    </div>
    <?php endforeach; ?>
  </main>
  <script src="../js/viewProfileNutrizionista.js" type="text/javascript"></script>
</body>

</html>