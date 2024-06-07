<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../template/header/header.css">
    <link rel="stylesheet" href="styles/consulenza.css">
    <link rel="stylesheet" href="../template/components/components.css">
    <title>Consulenza</title>
</head>

<body>
    <?php include ("../template/header/headerCliente.html");
    require ("../consulenza.php"); ?>
    <main>
        <?php if (!empty($templateparams["consulenza"])): ?>
            <section>
                <h1>Consulenza prenotata:</h1>
                <ul>
                    <li>
                        <p>Data: <?php echo $templateparams["consulenza"][0]["Giorno"] ?></p>
                    </li>
                    <li>
                        <p>Orario:
                            <?php echo $templateparams["consulenza"][0]["OraInizio"], " - ", $templateparams["consulenza"][0]["OraFine"] ?>
                        </p>
                    </li>
                    <li>
                        <p>Tipo consulenza: <?php echo $templateparams["consulenza"][0]["Tipo"] ?></p>
                    </li>
                    <li>
                        <p>Tariffa: <?php echo $templateparams["consulenza"][0]["Tariffa"] ?></p>
                    </li>
                    <li>
                        Svolgimento:
                        <?php if (empty($templateparams["consulenza"][0]["Presenza"])) {
                            echo "Online";
                        } else {
                            echo "Presenza";
                        } ?>
                    </li>
                </ul>
            </section>
        <?php else: ?>
            <section>
                <h1>Prenota Consulenza:</h1>
                <ul>
                    <li>
                        <p>Non hai ancora nessuna consulenza in programma.</p>
                    </li>
                    <li>
                        <button class="btn" onclick="window.location.href='richiestaConsulenza.php'">Prenota</button>
                    </li>
                </ul>
            </section>
        <?php endif; ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>