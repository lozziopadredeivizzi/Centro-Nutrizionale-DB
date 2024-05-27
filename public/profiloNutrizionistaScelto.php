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
  <?php include ("../template/header/header.html") ?>
  <main>
    <div class="reviews" onclick="window.location.href='recensioni.php'">
      <img src="../assets/icons/star.svg" alt="star-review">
      <p>Media</p>
      <p>(Numero recensioni)</p>
    </div>
    <div class="name">
      <h1>Nome Cognome</h1>
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
            <li>Città</li>
            <li>Cap:</li>
            <li>Qualifica:</li>
            <li>Specializzazione:</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="shifts-outer">
      <div class="shifts">
        <h3>Orari</h3>
        <div class="shift-details">
          <ul>
            <li>Orario:</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="rates-outer">
      <div class="rates">
        <h3>Tariffa</h3>
        <div class="rate-details">
          <ul>
            <li>Tariffa 1:</li>
            <li>Tariffa 2:</li>
          </ul>
        </div>
      </div>
    </div>
  </main>
</body>

</html>