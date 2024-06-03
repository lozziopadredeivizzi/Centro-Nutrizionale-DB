<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/homepage.css">
  <title>HomePage</title>
</head>

<body>
  <?php include "../template/header/headerNutrizionista.html";
  require("../bootstrap.php");
  $id = $_SESSION["id"];
  require("../nutrizionista.php"); ?>
  <main>
    <div class="left-side-container">
      <div class="info-container">
        <img src="../assets/icons/person.svg" alt="person-logo">
        <p>ID NUTRIZIONISTA: <?php echo $_SESSION["id"]; ?></p>
        <p class="nome bold">
          <?php echo $templateparams["nutrizionista"][0]["Nome"], " ", $templateparams["nutrizionista"][0]["Cognome"]; ?>
        </p>        
        <div class="info">
          <p class="bold">Qualifica</p>
          <div class="info-dettagli">
            <p><?php echo $templateparams["nutrizionista"][0]["Titolo"]; ?></p>
          </div>
        </div>
        <div class="info">
          <p class="bold">Informazioni</p>
          <div class="info-dettagli">
            <p>Esperienza: <?php echo $templateparams["nutrizionista"][0]["Esperienza"]; ?></p>
            <p>Specializzazione: <?php echo $templateparams["nutrizionista"][0]["Specializzazione"]; ?></p>
            <p>Orari: <?php echo $templateparams["nutrizionista"][0]["Orari"]; ?></p>
            <p class="email">Email: <?php echo $templateparams["nutrizionista"][0]["Email"]; ?></p>
            <p>Telefono: <?php echo $templateparams["nutrizionista"][0]["Telefono"]; ?></p>
          </div>
        </div>
        <div class="indirizzo">
          <p class="bold">Indirizzo</p>
          <div class="indirizzo-info">
            <p><?php echo $templateparams["nutrizionista"][0]["Via"]; ?></p>
            <p><?php echo $templateparams["nutrizionista"][0]["NCivico"]; ?>,</p>
            <p><?php echo $templateparams["nutrizionista"][0]["Citta"]; ?>,</p>
            <p><?php echo $templateparams["nutrizionista"][0]["CAP"]; ?></p>
          </div>
        </div>
        <label class="bold" for="valutazione">Valutazione</label>
        <?php
        $mediaInt = $templateparams["nutrizionista"][0]["MediaVoti"];
        if ($mediaInt == 0) {
          echo "Questo nutrizionista non ha ancora ricevuto recensioni.";
        } else {
        ?>
          <div class="rating">
            <?php
            for ($i = 0; $i < 5; $i++) {
              if ($i < $mediaInt) {
            ?>
                <img src="../assets/icons/star.svg" alt="star">
            <?php
              }
            }
            ?>
          </div>
          <button onclick="window.location.href='recensioni.php'">Vedi Recensioni</button>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="right-side-container">
      <div class="btn-container">
        <button onclick="window.location.href='cercaCliente.php'">Clienti</button>
        <button onclick="window.location.href='consulenzeDaFare.php'">Consulenze</button>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>