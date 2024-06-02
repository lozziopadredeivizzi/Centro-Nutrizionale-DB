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
  <?php include ("../template/header/headerCliente.html") ?>
  <main>
    <h1>Diario</h1>
    <div class="outer">
      <h3>Visualizzazione giornaliera</h3>
      <input class="date" type="date" id="date-input" name="date-input">
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
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <button class="btn" onclick="window.location.href='aggiungiAlDiario.php'">Aggiungi elemento</button>
    </div>
  </main>
  <script>
    // Ottieni la data corrente
    const today = new Date();
    // Formatta la data in modo che sia accettabile per l'input di tipo date
    const formattedDate = today.toISOString().split('T')[0];
    // Imposta la data formattata come valore predefinito dell'input
    document.getElementById('date-input').value = formattedDate;
  </script>
</body>

</html>