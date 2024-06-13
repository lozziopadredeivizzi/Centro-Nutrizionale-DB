<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/components/components.css">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/profilo.css">
  <title>Profilo Cliente</title>
</head>

<body>
  <?php include ("../template/header/headerNutrizionista.html");
  require("../bootstrap.php");
  $id = $_SESSION["idCliente"];
  require("../cliente.php"); ?>
  <main>
    <div class="name">
      <h1><?php echo $templateparams["cliente"][0]["Nome"], " ", $templateparams["cliente"][0]["Cognome"]; ?></h1>
    </div>
    <div class="action">
      <button class="btn" onclick="window.location.href='diario.php'">Visualizza Diario</button>
    </div>
    <div class="infos-outer">
      <div class="infos">
        <h3>Informazioni</h3>
        <div class="info-details">
          <ul>
            <li>Città: <?php echo $templateparams["cliente"][0]["Citta"]; ?></li>
            <li>CAP: <?php echo $templateparams["cliente"][0]["CAP"]; ?></li>
            <li>E-mail: <?php echo $templateparams["cliente"][0]["Email"]; ?></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="infos-outer">
      <div class="infos">
        <h3>Altre Informazioni</h3>
        <div class="info-details">
          <ul>
            <li>Numero consulenze effettuate: <?php echo $templateparams["nConsulenze"][0]["count"]; ?></li><br>
            <li>Consulenze richieste online: <?php echo $templateparams["trend"][0]["ConsulenzeInPresenza"]; ?></li>
            <li>Consulenze richieste in presenza: <?php echo $templateparams["trend"][0]["ConsulenzeOnline"]; ?></li>
          </ul>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>