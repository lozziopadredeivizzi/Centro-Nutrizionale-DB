<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/storicoPrescrizioni.css">
    <link rel="stylesheet" href="styles/consulenzeDaFare.css">
    <link rel="stylesheet" href="../template/header/header.css">
    <link rel="stylesheet" href="../template/components/components.css">
    <title>Consulenze</title>
</head>

<body>
    <?php include ("../template/header/headerNutrizionista.html");
    require ("../consulenza.php"); ?>
    <main>
        <section>
            <h1>Consulenze da svolgere</h1>
            <?php foreach ($templateparams["daFare"] as $consulenza): ?>
                <?php $cliente = $dbh->getClienteTable()->getClienteById($consulenza["IDCliente"]); ?>
                <article>
                    <div class="result">
                        <ul>
                            <li>ID: <?php echo $consulenza["IDCliente"] ?></li>
                            <li><?php echo $cliente[0]["Nome"], " ", $cliente[0]["Cognome"] ?></li>
                            <li><?php echo $consulenza["Giorno"] ?></li>
                            <li><?php echo $consulenza["OraInizio"] ?></li>
                            <li><?php echo $consulenza["Tipo"] ?></li>
                            <li><button class="btn">Compila Scheda</button></li>
                        </ul>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/goToCompila.js" type="text/javascript"></script>
    <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>