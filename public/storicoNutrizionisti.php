<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/storicoNutrizionisti.css">
  <title>Storico Nutrizionisti</title>
</head>

<body>
  <?php 
  include ("../template/header/headerCliente.html");
  require ("../nutrizionista.php");

  $idsStampati = array(); 
  ?>
  <main>
    <section>
      <h1>Storico Nutrizionisti</h1>
      <?php foreach ($templateparams["storicoNutrizionisti"] as $nutrizionista): ?>
        <?php if (!in_array($nutrizionista["IDNutrizionista"], $idsStampati)): ?>
          <article>
            <p>Data Scelta: <?php echo $nutrizionista["Data"] ?></p>
            <div onclick="window.location.href='profiloNutrizionista.php'" class="result"
              data-id="<?php echo $nutrizionista["IDNutrizionista"] ?>" data-sceltaAttuale="<?php if ($templateparams["nutrizionistaAttuale"][0]["IDNutrizionista"] == $nutrizionista["IDNutrizionista"]) {
                   echo "si";
                 } else {
                   echo "no";
                 } ?>">
              <ul>
                <li>ID: <?php echo $nutrizionista["IDNutrizionista"] ?></li>
                <li><?php echo $nutrizionista["Nome"], " ", $nutrizionista["Cognome"] ?></li>
                <li>Città: <?php echo $nutrizionista["Citta"] ?></li>
                <li>CAP: <?php echo $nutrizionista["CAP"] ?></li>
                <li>Qualifica: <?php echo $nutrizionista["Qualifica"] ?></li>
              </ul>
            </div>
          </article>
          <?php 
          $idsStampati[] = $nutrizionista["IDNutrizionista"]; 
          ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </section>
  </main>
  <script src="../js/viewProfileNutrizionista.js" type="text/javascript"></script>
</body>
</html>
