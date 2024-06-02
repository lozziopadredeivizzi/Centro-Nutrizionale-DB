<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/homepage.css">
  <title>HomePage</title>
</head>

<body>
  <?php include "../template/header/header.html";
  require("../bootstrap.php");
  require("../cliente.php"); ?>
  <main>
    <div class="left-side-container">
      <div class="info-container">
        <img src="../assets/icons/person.svg" alt="person-logo">
        <p>ID CLIENTE: <?php echo $_SESSION["id"]; ?></p>
        <p class="nome bold">
          <?php echo $templateparams["cliente"][0]["Nome"], " ", $templateparams["cliente"][0]["Cognome"]; ?>
        </p>
        <div class="info">
          <p class="bold">Informazioni</p>
          <div class="info-dettagli">
            <p>Email: <?php echo $templateparams["cliente"][0]["Email"]; ?></p>
            <p>Città: <?php echo $templateparams["cliente"][0]["Citta"]; ?></p>
            <p>CAP: <?php echo $templateparams["cliente"][0]["CAP"]; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="right-side-container">
      <div class="btn-container">
        <button onclick="window.location.href='cercaNutrizionista.php'">Cerca Nutrizionista</button>
        <button onclick="window.location.href='profiloNutrizionistaScelto.php'">Il tuo Nutrizionista</button>
        <button onclick="window.location.href='storicoNutrizionisti.php'">Storico Nutrizionisti</button>
        <button onclick="window.location.href='prescrizioni.php'">Prescrizioni</button>
        <button onclick="window.location.href='diario.php'">Diario</button>
      </div>
    </div>
  </main>
</body>

</html>