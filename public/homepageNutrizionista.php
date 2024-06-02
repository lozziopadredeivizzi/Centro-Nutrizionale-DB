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
  <?php include "../template/header/header.html";
  require ("../bootstrap.php");
  $id = $_SESSION["id"];
  require ("../nutrizionista.php"); ?>
  <main>
    <div class="left-side-container">
      <div class="info-container">
        <img src="../assets/icons/person.svg" alt="person-logo">
        <p>ID NUTRIZIONISTA: <?php echo $_SESSION["id"]; ?></p>
        <p class="nome">
          <?php echo $templateparams["nutrizionista"][0]["Nome"], " ", $templateparams["nutrizionista"][0]["Cognome"]; ?>
        </p>
        <p class="email"><?php echo $templateparams["nutrizionista"][0]["Email"]; ?></p>
        <label for="valutazione">Valutazione</label>
        <?php
        $mediaInt = $templateparams["nutrizionista"][0]["MediaVoti"];
        if ($mediaInt == 0) {
          echo "Questo nutrizionista non ha ancora ricevuto recensioni.";
      } else {
        for ($i = 0; $i < 5; $i++):
          if ($i < $mediaInt):
            ?>
            <img src="../assets/icons/star.svg" alt="star">
            <?php
          endif;
          if ($i >= $valutazioneInt):
            ?>
            <img src="../assets/icons/star.svg" alt="">
            <?php
          endif;
        endfor;
      }
        ?>
        <button onclick="window.location.href='recensioni.php'">Vedi Recensioni</button>
      </div>
    </div>
    <div class="right-side-container">
      <div class="btn-container">
        <button onclick="window.location.href='cercaCliente.php'">Clienti</button>
        <button onclick="window.location.href='consulenzeDaFare.php'">Consulenze</button>
      </div>
    </div>
  </main>
</body>

</html>