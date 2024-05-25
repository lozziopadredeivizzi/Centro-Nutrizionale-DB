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
  <?php include "../template/header/header.html";?>
  <main>
    <div class="left-side-container">
      <div class="info-container">
        <img src="../assets/icons/person.svg" alt="person-logo">
        <p>ID NUTRIZIONISTA</p>
        <p class="nome">Nome e Cognome</p>
        <p class="email">Email</p>
        <label for="valutazione">Valutazione</label>
        <img class="star" src="../assets/icons/star.svg" id="valutazione" alt="star">
        <button>Vedi Recensioni</button>
      </div>
    </div>
    <div class="right-side-container">
      <div class="btn-container">
        <button onclick="window.location.href='cercaCliente.html'">Clienti</button>
        <button onclick="window.location.href='consulenzeDaFare.html'">Consulenze</button>
      </div>
    </div>
  </main>
</body>

</html>