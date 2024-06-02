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
  <?php include ("../template/header/headerNutrizionista.html") ?>
  <main>
    <div class="name">
      <h1>Nome Cognome</h1>
    </div>
    <div class="action">
      <button class="btn" onclick="window.location.href='diario.php'">Visualizza Diario</button>
    </div>
    <div class="infos-outer">
      <div class="infos">
        <h3>Informazioni</h3>
        <div class="info-details">
          <ul>
            <li>Città</li>
            <li>Indirizzo:</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="infos-outer">
      <div class="infos">
        <h3>Altre Informazioni</h3>
        <div class="info-details">
          <ul>
            <li>Cliente da:</li>
            <li>Numero consulenze effettuate:</li>
            <li>Percentuale consulenze online:</li>
            <li>Percentuale consulenze in presenza:</li>
            <li>Obiettivi richiesti:</li>
          </ul>
        </div>
      </div>
    </div>
  </main>
</body>

</html>