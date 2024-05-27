<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/components/components.css">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/diario.css">
  <title>Aggiungi al Diario</title>
</head>
<body>
  <body>
    <?php include("../template/header/header.html") ?>
    <main>
      <h1>Aggiungi elemento al Diario</h1>
      <div class="outer add">
        <table>
          <thead>
            <tr>
              <td>Orario</td>
              <td>Azione</td>
              <td>Descrizione</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="time" name="orario"></td>
              <td><input type="text" name="azione"></td>
              <td><input type="text" name="descrizione"></td>
            </tr>
          </tbody>
        </table>
        <button class="btn">Aggiungi</button>
        <button class="btn" onclick="window.location.href='diario.php'">Torna al Diario</button>
      </div>
    </main>
</body>
</html>