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
  <?php 
  require ("../bootstrap.php");
  if(empty($_SESSION["NSignedin"])){
      $id = $_SESSION["idNutrizionista"];
      include ("../template/header/headerCliente.html");
  } else{
    $id = $_SESSION["NSignedin"];
    include("../template/header/headerNutrizionista.html");
  }
  require ("../nutrizionista.php"); ?>
  <main>
    <div class="name">
      <h1><?php echo $templateparams["nutrizionista"][0]["Nome"], " ", $templateparams["nutrizionista"][0]["Cognome"] ?>
      </h1>
    </div>
    <?php if ($templateparams["recensioniNutrizionista"]["numeroTotaleRecensioni"] == 0): ?>
      <p>Questo nutrizionista non ha ancora ricevuto recensioni.</p>
    <?php else: ?>
      <div class="reviews-outer">
        <div class="reviews-summary">
          <?php
          $mediaInt = $templateparams["nutrizionista"][0]["MediaVoti"];
          if ($mediaInt == 0) {
            echo "Questo nutrizionista non ha ancora ricevuto recensioni.";
          } else {
            for ($i = 0; $i < 5; $i++):
              if ($i < $mediaInt):
                ?>
                <img src="../assets/icons/star.svg" alt="star">
                <?php
              endif;
            endfor; ?>
            <p>
              <?php echo $mediaInt, " (", $templateparams["recensioniNutrizionista"]["numeroTotaleRecensioni"], " recensioni)"; ?>
            </p>
            <?php
          }
          ?>
        </div>
        <?php foreach ($templateparams["recensioni"] as $recensione): ?>
          <div class="review">
            <div class="review-info">
              <div class="stars">
                <?php
                $voto = $recensione["Voto"];
                for ($i = 0; $i < 5; $i++):
                  if ($i < $voto):
                    ?>
                    <img class="star" src="../assets/icons/star.svg" alt="star-review">
                    <?php
                  endif;
                endfor; ?>
              </div>
              <p class="cliente"><?php $cliente = $dbh->getClienteTable()->getClienteById($recensione["IDCliente"]);
              echo $cliente[0]["Nome"], " ", $cliente[0]["Cognome"]; ?></p>
            </div>
            <p><?php echo $recensione["Commento"] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>
