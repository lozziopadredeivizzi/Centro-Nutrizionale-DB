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
  <?php include "../template/header/header.html";?>
  <main>
    <div class="left-side-container">
      <div class="info-container">
        <img src="../assets/icons/person.svg" alt="person-logo">
        <p>ID CLIENTE</p>
        <p>Nome e Cognome</p>
        <p>Email</p>
      </div>
    </div>
    <div class="right-side-container">
      <div class="btn-container">
        <button onclick="window.location.href='cercaNutrizionista.html'">Cerca Nutrizionista</button>
        <button onclick="window.location.href='profiloNutrizionistaScelto.html'" >Il tuo Nutrizionista</button>
        <button onclick="window.location.href='storicoNutrizionisti.html'">Storico Nutrizionisti</button>
        <button onclick="window.location.href='prescrizioni.html'">Prescrizioni</button>
        <button>Diario</button>
      </div>
    </div>
  </main>
</body>

</html>