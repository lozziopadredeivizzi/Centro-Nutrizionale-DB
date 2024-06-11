<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../template/header/header.css">
    <link rel="stylesheet" href="styles/storicoPrescrizioni.css">
    <title>Storico Prescrizioni</title>
</head>

<body>
    <?php include ("../template/header/headerCliente.html");
    require("../storicoSchede.php"); ?>
    <main>
        <section>
            <h1>Storico Prescrizioni</h1>
            <?php foreach($templateparams["storico"] as $scheda): ?>
            <article data-codScheda="<?php echo $scheda["CodiceScheda"] ?>" class="schede">
                <p>Data Emissione: <?php echo $scheda["DataInizioValidita"]; ?></p>
                <div onclick="window.location.href='vecchiaPrescrizione.php'" class="result">
                    <ul>
                        <li><?php echo $scheda["Obiettivo"]; ?></li>
                        <li><?php echo $scheda["Tipo"]; ?></li>
                        <li>Durata: <?php echo $scheda["Durata"]; ?></li>
                    </ul>
                </div>
            </article>
            <?php endforeach; ?>
        </section>
    </main>
    <script src="../js/viewSchedaVecchia.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>