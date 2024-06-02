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
  <?php include ("../template/header/headerCliente.html") ?>
  <main>
    <h1>Scrivi Recensione</h1>
    <div class="review-outer">
      <div class="value">
        <label for="star-rating">Assegna una valutazione</label>
        <div class="star-rating" id="star-rating">
          <img class="star" data-value="1" src="../assets/icons/star.svg" alt="star-icon">
          <img class="star" data-value="2" src="../assets/icons/star.svg" alt="star-icon">
          <img class="star" data-value="3" src="../assets/icons/star.svg" alt="star-icon">
          <img class="star" data-value="4" src="../assets/icons/star.svg" alt="star-icon">
          <img class="star" data-value="5" src="../assets/icons/star.svg" alt="star-icon">
        </div>
      </div>
      <div class="text">
        <label for="review">Scrivi la recensione</label>
        <textarea name="recensione" id="review"></textarea>
      </div>
      <button class="btn">Pubblica</button>
    </div>
  </main>
</body>

</html>