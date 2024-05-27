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
    <?php include ("../template/header/header.html") ?>
    <main>
        <section>
            <h1>Consulenze da svolgere</h1>
            <article>
                <div class="result">
                    <ul>
                        <li>ID</li>
                        <li>Nome Cognome cliente</li>
                        <li>Data</li>
                        <li>Ora</li>
                        <li>Completa</li>
                        <li><button class="btn">Compila Scheda</button></li>
                    </ul>
                </div>
            </article>
            <article>
                <div class="result">
                    <ul>
                        <li>ID</li>
                        <li>Nome Cognome cliente</li>
                        <li>Data</li>
                        <li>Ora</li>
                        <li>Alimentare</li>
                        <li><button class="btn">Compila Scheda</button></li>
                    </ul>
                </div>
            </article>
            <article>
                <div class="result">
                    <ul>
                        <li>ID</li>
                        <li>Nome Cognome cliente</li>
                        <li>Data</li>
                        <li>Ora</li>
                        <li>Fisica</li>
                        <li><button class="btn">Compila Scheda</button></li>
                    </ul>
                </div>
            </article>
        </section>
    </main>
    <script src="../js/goToCompila.js" type="text/javascript"></script>
</body>

</html>