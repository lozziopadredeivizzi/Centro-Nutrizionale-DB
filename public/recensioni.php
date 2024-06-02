<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../template/components/components.css">
  <link rel="stylesheet" href="../template/header/header.css">
  <link rel="stylesheet" href="styles/recensioni.css">
  <title>Recensioni</title>
</head>

<body>
  <?php include ("../template/header/headerCliente.html");
  require("../bootstrap.php");
  $id = $_SESSION["idNutrizionista"];
  require ("../nutrizionista.php"); ?>
  <main>
    <div class="name">
      <h1><?php echo $templateparams["nutrizionista"][0]["Nome"], " ", $templateparams["nutrizionista"][0]["Cognome"] ?></h1>
    </div>
    <?php if($templateparams["recensioniNutrizionista"]["numeroTotaleRecensioni"]==0): ?>
      <p>Questo nutrizionista non ha ancora ricevuto recensioni.</p>
      <?php else: ?>
    <div class="reviews-outer">
      <div class="reviews-summary">
        <img class="star" src="../assets/icons/star.svg" alt="star-review">
        Media</p>
        <p>(Numero recensioni)</p>
      </div>
      <div class="review">
        <div class="review-info">
          <img class="star" src="../assets/icons/star.svg" alt="star-review">
          <p>Nome Cognome</p>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum illum blanditiis, tempore a nulla maiores
          omnis hic. Iure culpa earum nulla vitae tenetur error, qui a aliquam veritatis, illum odit placeat optio
          cupiditate sequi dicta, porro fugit nemo aliquid quibusdam!</p>
      </div>
    </div>
    <?php endif; ?>
  </main>
</body>

</html>