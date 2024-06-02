<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/components/components.css">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/scriviRecensione.css">
  <title>Scrivi Recensione</title>
</head>

<body>
  <?php include ("../template/header/headerCliente.html");
  require ("../bootstrap.php");
  $id = $_SESSION["idNutrizionista"]; ?>
  <main>
    <h1>Scrivi Recensione</h1>
    <div class="review-outer">
      <form action="../aggiungiRecensione.php" method="post">
        <div class="value">
          <label for="star-rating">Assegna una valutazione</label><br><br>
          <fieldset id="valutazione">
            <label for="star1"><img src="../assets/icons/star.svg" alt="rate 1"></label>
            <input type="radio" id="star1" name="Valutazione" value="1" hidden required>
            <label for="star2"><img src="../assets/icons/star.svg" alt="rate 2"></label>
            <input type="radio" id="star2" name="Valutazione" value="2" hidden>
            <label for="star3"><img src="../assets/icons/star.svg" alt="rate 3"></label>
            <input type="radio" id="star3" name="Valutazione" value="3" hidden>
            <label for="star4"><img src="../assets/icons/star.svg" alt="rate 4"></label>
            <input type="radio" id="star4" name="Valutazione" value="4" hidden>
            <label for="star5"><img src="../assets/icons/star.svg" alt="rate 5"></label>
            <input type="radio" id="star5" name="Valutazione" value="5" hidden>
          </fieldset>
        </div>
        <div class="text">
          <label for="review">Scrivi la recensione</label>
          <textarea name="recensione" id="review" required></textarea>
        </div>
        <button type="submit" class="btn">Pubblica</button>
      </form>
    </div>
  </main>
  <script src="../js/rating.js"></script>
</body>

</html>