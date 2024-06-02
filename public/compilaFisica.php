<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/compila.css">
    <link rel="stylesheet" href="../template/header/header.css">
    <title>Compila</title>
</head>

<body>
    <?php include ("../template/header/headerNutrizionista.html") ?>
    <main>
        <section>
            <form id="dynamic-form" action="#" method="post">
                <section class="exercise-section">
                    <h1>Tabella Esercizi</h1>
                    <div class="exercise-group" data-group-id="1">
                        <label for="exercise1">Nome Esercizio:</label>
                        <select id="exercise1" name="exercise[]" required>
                            <option value="esercizio1">Esercizio 1</option>
                            <option value="esercizio2">Esercizio 2</option>
                            <option value="esercizio3">Esercizio 3</option>
                        </select>

                        <label for="frequency1">Frequenza Settimanale:</label>
                        <input type="text" id="frequency1" name="frequency[]" required>

                        <label for="duration1">Durata:</label>
                        <input type="text" id="duration1" name="duration[]" required>

                        <button type="button" class="add-exercise">Aggiungi Esercizio</button>
                    </div>
                </section>

                <div class="advice-group" data-group-id="1">
                    <label for="advice1">Consiglio 1:</label>
                    <textarea id="advice1" name="advice[]" required></textarea>
                    <button type="button" class="add-advice">Aggiungi Consiglio</button>
                </div>

                <input type="submit" value="Invia">
            </form>
        </section>
    </main>
    <script src="../js/aggiungiEsercizio.js" type="text/javascript"></script>
</body>

</html>