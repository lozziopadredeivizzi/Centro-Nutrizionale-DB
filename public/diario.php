<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/components/components.css">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/diario.css">
  <title>Diario</title>
</head>

<body>
  <?php
  require ("../bootstrap.php");
  if (empty($_SESSION["NSignedin"])) {
    include ("../template/header/headerCliente.html");
  } else {
    include ("../template/header/headerNutrizionista.html");
  }
  require ("../diario.php");
  ?>
  <main>
    <h1>Diario</h1>
    <?php if (empty($templateparams["diario"])) {
      echo "Non hai ancora scelto il tuo nutrizionista.";
    } else { ?>
      <div class="outer">
        <h2>Condiviso con: <?php $nutrizionista = $dbh->getNutrizionistaTable()->getNutrizionistaById($templateparams["diario"][0]["IDNutrizionista"]);
        echo $nutrizionista[0]["Nome"], " ", $nutrizionista[0]["Cognome"]; ?></h2>
        <h3>Codice Diario: <?php echo $templateparams["diario"][0]["CodDiario"]; ?></h3>
        <table>
          <thead>
            <tr>
              <td>Data</td>
              <td>Orario</td>
              <td>Descrizione</td>
              <td>Azione</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($templateparams["diario"] as $nota): ?>
              <tr>
                <td><?php echo $nota["DataNota"] ?></td>
                <td><?php echo $nota["OrarioNota"] ?></td>
                <td><?php echo $nota["Nota"] ?></td>
                <td><?php echo $nota["OggettoNota"] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php if (empty($_SESSION["NSignedin"])): ?>
          <button class="btn" onclick="window.location.href='aggiungiAlDiario.php'">Aggiungi elemento</button>
        <?php endif; ?>
      </div>
    <?php } ?>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>