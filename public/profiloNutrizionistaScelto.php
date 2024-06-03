<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/components/components.css">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/profilo.css">
  <title>Profilo Nutrizionista</title>
</head>

<body>
  <?php include ("../template/header/headerCliente.html");
  require ("../cliente.php");
  require ("../nutrizionista.php");
  if (!empty($templateparams["nutrizionistaAttuale"][0]["IDNutrizionista"])) {
    $id = $templateparams["nutrizionistaAttuale"][0]["IDNutrizionista"];
    require ("../nutrizionista.php");
  }
  if ($templateparams["checkScelta"][0]["isPresent"] == 0): ?>
    <br>
    <br>
    <br>
    <h1>Non hai acora effettuato la scelta del nutrizionista.</h1>
  <?php else: ?>
    <main>
      <div class="reviews" onclick="window.location.href='recensioni.php'">
        <?php
        $mediaInt = $templateparams["nutrizionistaAttuale"][0]["MediaVoti"];
        if ($mediaInt == 0) {
          echo "Questo nutrizionista non ha ancora ricevuto recensioni.";
        } else {
          for ($i = 0; $i < 5; $i++):
            if ($i < $mediaInt):
              ?>
              <img src="../assets/icons/star.svg" alt="star">
              <?php
            endif;
          endfor; ?>
          <p><?php echo $mediaInt; ?></p>
          <p>(<?php echo $templateparams["recensioniNutrizionista"]["numeroTotaleRecensioni"]; ?> recensioni)</p>
          <?php
        }
        ?>
      </div>
      <div class="name">
        <h1>
          <?php echo $templateparams["nutrizionistaAttuale"][0]["Nome"], " ", $templateparams["nutrizionistaAttuale"][0]["Cognome"] ?>
        </h1>
      </div>
      <div class="action">
        <button onclick="window.location.href='consulenza.php'" class="btn">Richiedi Consulenza</button>
      </div>
      <br>
      <div class="action">
        <button class="btn" onclick="window.location.href='scriviRecensione.php'">Scrivi una recensione</button>
      </div>
      <div class="infos-outer">
        <div class="infos">
          <h3>Informazioni</h3>
          <div class="info-details">
            <ul>
              <li>E-mail: <?php echo $templateparams["nutrizionistaAttuale"][0]["Email"] ?></li>
              <li>Qualifica: <?php echo $templateparams["nutrizionistaAttuale"][0]["Qualifica"] ?></li>
              <li>Specializzazione: <?php echo $templateparams["nutrizionistaAttuale"][0]["Specializzazione"] ?></li>
              <li>Esperienza: <?php echo $templateparams["nutrizionistaAttuale"][0]["Esperienza"] ?></li>
              <li>Telefono: <?php echo $templateparams["nutrizionistaAttuale"][0]["Telefono"] ?></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="shifts-outer">
        <div class="shifts">
          <h3>Orari</h3>
          <div class="shift-details">
            <ul>
              <li>Orario: <?php echo $templateparams["nutrizionistaAttuale"][0]["Orari"] ?></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="rates-outer">
        <div class="rates">
          <h3>Indirizzo Professionale</h3>
          <div class="rate-details">
            <ul>
              <li>Città: <?php echo $templateparams["nutrizionistaAttuale"][0]["Citta"] ?></li>
              <li>Via: <?php echo $templateparams["nutrizionistaAttuale"][0]["Via"] ?></li>
              <li>N. Civico: <?php echo $templateparams["nutrizionistaAttuale"][0]["NCivico"] ?></li>
              <li>CAP: <?php echo $templateparams["nutrizionistaAttuale"][0]["CAP"] ?></li>
            </ul>
          </div>
        </div>
      </div>
    </main>
  <?php endif;
  $_SESSION["idNutrizionista"] = $id; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>