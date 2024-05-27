<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../template/components/components.css">
    <link rel="stylesheet" href="styles/prescrizioni.css">
    <link rel="stylesheet" href="../template/header/header.css">
    <title>Prescrizioni</title>
</head>

<body>
    <?php include ("../template/header/header.html") ?>
    <main>
        <section>
            <ul>
                <li>
                    <button class="btn" onclick="window.location.href='ultimaPrescrizione.php'">Ultima
                        Prescrizione</button>
                </li>
                <li>
                    <button class="btn" onclick="window.location.href='storicoPrescrizioni.php'">Storico
                        Prescrizioni</button>
                </li>
            </ul>
        </section>
    </main>
</body>

</html>