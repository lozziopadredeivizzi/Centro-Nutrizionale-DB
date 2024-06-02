<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../template/header/header.css">
    <link rel="stylesheet" href="styles/richiestaConsulenza.css">
    <link rel="stylesheet" href="../template/components/components.css">
    <title>Richiesta Consulenza</title>
</head>

<body>
    <?php include ("../template/header/headerCliente.html");
    require ("../consulenza.php");
    require ("../aggiungiConsulenza.php"); ?>
    <main>
        <section>
            <h1>Richiesta Consulenza</h1>
            <h2>Compila la richiesta</h2>
            <form action="#" method="post">
                <ul>
                    <li>
                        <label for="svolgimento">Svolgimento:</label>
                        <select id="svolgimento" name="svolgimento">
                            <option value="presenza">Presenza</option>
                            <option value="online">Online</option>
                        </select>
                    </li>
                    <li>
                        <label for="tipoConsulenza">Tipologia:</label>
                        <select id="tipoConsulenza" name="tipoConsulenza">
                            <?php foreach ($templateparams["tipoConsulenza"] as $tipo): ?>
                                <option value="<?php echo $tipo["Tipo"] ?>">
                                    <?php echo $tipo["Tipo"], " ", $tipo["Tariffa"], "$" ?></option>
                            <?php endforeach; ?>
                        </select>
                    </li>
                    <li>
                        <label for="data">Data:</label>
                        <input type="date" name="data" id="data" required>
                    </li>
                    <li>
                        <label for="orario">Orario:</label>
                        <input type="time" name="orario" id="orario" required>
                    </li>
                    <li>
                        <button class="btn" type="button" id="controllaDisp" name="controllaDisp">Controlla
                            Disponibilità</button>
                    </li>
                    <li class="hidden" id="availabilityMessage">
                        La data e l'ora scelta sono disponibili<button class="btn" type="submit" id="prenota"
                            name="prenota">Prenota</button>
                    </li>
                </ul>
            </form>
        </section>
    </main>
    <script>
        document.getElementById('controllaDisp').addEventListener('click', function () {
            // Simula il controllo della disponibilità
            var availabilityMessage = document.getElementById('availabilityMessage');
            availabilityMessage.classList.remove('hidden');
        });
    </script>
</body>

</html>