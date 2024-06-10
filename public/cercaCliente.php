<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/components/components.css">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/cercaNutrizionista.css">
  <link rel="stylesheet" href="styles/cercaCliente.css">

  <title>Cerca Cliente</title>
</head>

<body>
  <?php include ("../template/header/headerNutrizionista.html");
  require ("../cliente.php"); ?>
  <main>
    <form action="">
      <h1>Filtra Risultati</h1>
      <div class="name">
        <label for="name">Nome</label>
        <input class="txt" type="text" id="name">
      </div>
      <div class="surname">
        <label for="surname">Cognome</label>
        <input class="txt" type="text" id="surname">
      </div>
      <div class="city">
        <label for="city">Città</label>
        <input class="txt" type="text" id="city">
      </div>
      <button class="btn">Applica Filtri</button>
    </form>
    <?php foreach ($templateparams["ultimaScelta"] as $scelta):
      if ($scelta["E_L_ultima_scelta"] == "Sì"):
        $cliente = $dbh->getClienteTable()->getClienteById($scelta["IDCliente"]); ?>
        <div onclick="window.location.href='profiloCliente.php'" class="result" data-id="<?php echo $cliente[0]["IDCliente"]; ?>">
          <ul>
            <li>ID: <?php echo $cliente[0]["IDCliente"]; ?></li>
            <li><?php echo $cliente[0]["Nome"], " ", $cliente[0]["Cognome"] ; ?></li>
            <li>Città: <?php echo $cliente[0]["Citta"]; ?></li>
          </ul>
        </div>
      <?php endif;
    endforeach; ?>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/exit.js" type="text/javascript"></script>
  <script src="../js/viewProfileCliente.js" type="text/javascript"></script>
</body>

</html>