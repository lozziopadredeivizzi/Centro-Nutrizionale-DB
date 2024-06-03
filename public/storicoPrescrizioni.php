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
    <?php include ("../template/header/headerCliente.html") ?>
    <main>
        <section>
            <h1>Storico Prescrizioni</h1>
            <article>
                <p>Data Emissione: dd/mm/yyyy</p>
                <div onclick="window.location.href='vecchiaPrescrizione.php'" class="result">
                    <ul>
                        <li>Obiettivo</li>
                        <li>Tipologia</li>
                        <li>Durata</li>
                    </ul>
                </div>
            </article>
            <article>
                <p>Data Emissione: dd/mm/yyyy</p>
                <div onclick="window.location.href='vecchiaPrescrizione.php'" class="result">
                    <ul>
                        <li>Obiettivo</li>
                        <li>Tipologia</li>
                        <li>Durata</li>
                    </ul>
                </div>
            </article>
            <article>
                <p>Data Emissione: dd/mm/yyyy</p>
                <div onclick="window.location.href='vecchiaPrescrizione.php'" class="result">
                    <ul>
                        <li>Obiettivo</li>
                        <li>Tipologia</li>
                        <li>Durata</li>
                    </ul>
                </div>
            </article>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>