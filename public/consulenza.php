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
    <?php include ("../template/header/header.html") ?>
    <main>
        <section>
            <h1>Consulenza prenotata:</h1>
            <ul>
                <li>
                    <p>Data: dd/mm/yyyy</p>
                </li>
                <li>
                    <p>Orario: hh:mm</p>
                </li>
                <li>
                    <p>Tipo consulenza: aliamentare/completa/fisica</p>
                </li>
                <li>
                    <p>Tariffa: $$</p>
                </li>
                <li>
                    <button class="btn">Cancella consulenza</button>
                </li>
            </ul>
        </section>
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
    </main>

</body>

</html>