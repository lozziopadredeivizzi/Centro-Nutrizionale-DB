<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/components/components.css">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/cercaNutrizionista.css">
  <title>Cerca Nutrizionista</title>
</head>

<body>
  <?php include ("../template/header/header.html") ?>
  <main>
    <form action="">
      <h1>Filtra Risultati</h1>
      <div class="city">
        <label for="city">Città</label>
        <input class="txt" type="text" id="city">
      </div>
      <div class="cap">
        <label for="cap">Cap</label>
        <input class="txt" type="text" id="cap">
      </div>
      <div class="specialization">
        <label for="specialization">Specializzazione</label>
        <input class="txt" type="text" id="specialization">
      </div>
      <button class="btn">Applica Filtri</button>
    </form>
    <div onclick="window.location.href='profiloNutrizionista.php'" class="result">
      <ul>
        <li>ID</li>
        <li>Nome Cognome</li>
        <li>Città</li>
        <li>Cap</li>
        <li>Specializzazione</li>
      </ul>
    </div>
    <div onclick="window.location.href='profiloNutrizionista.php'" class="result">
      <ul>
        <li>ID</li>
        <li>Nome Cognome</li>
        <li>Città</li>
        <li>Cap</li>
        <li>Specializzazione</li>
      </ul>
    </div>
  </main>
</body>

</html>