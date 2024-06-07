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
  <?php include("../template/header/headerCliente.html") ?>
  <main>
    <h1>Aggiungi elemento al Diario</h1>
    <div class="outer add">
      <form action="../aggiungiNota.php" method="post">
        <table>
          <thead>
            <tr>
              <td>Azione</td>
              <td>Descrizione</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name="azione" required></td>
              <td><input type="text" name="descrizione" required></td>
            </tr>
          </tbody>
        </table>
        <button type="submit" class="btn">Aggiungi</button>
        <button type="button" class="btn" onclick="window.location.href='diario.php'">Torna al Diario</button>
      </form>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/exit.js" type="text/javascript"></script>
</body>
</html>
