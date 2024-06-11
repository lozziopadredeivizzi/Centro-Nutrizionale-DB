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
    <?php include ("../template/header/headerNutrizionista.html");
    require ("../alimenti.php");
    require ("../esercizi.php");
    require("../obiettivi.php"); ?>
    <main>
        <section>
            <form id="dynamic-form" action="../compilaCompleta.php" method="post">
                <label for="obiettivo">Obiettivo:</label>
                <select name="obiettivo" id="obiettivo">
                    <?php foreach($templateparams["obiettivi"] as $obiettivo): ?>
                    <option value="<?php echo $obiettivo["Descrizione"] ?>"><?php echo $obiettivo["Descrizione"] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="durata">Durata (in settimane):</label>
                <input type="number" name="durata" id="durata" required>
                <section>
                    <h1>Tabella Alimenti</h1>
                    <div class="input-group" data-group-id="1">
                        <label for="meal1">Pasto:</label>
                        <select id="meal1" name="meal[]" required>
                            <?php foreach ($templateparams["pasti"] as $pasto): ?>
                                <option value="<?php echo $pasto["NomePasto"] ?>"><?php echo $pasto["NomePasto"] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="prescribed1">Alimento:</label>
                        <select id="prescribed1" name="prescribed[]" required>
                            <?php foreach ($templateparams["alimenti"] as $alimento): ?>
                                <option value="<?php echo $alimento["NomeAlimento"] ?>">
                                    <?php echo $alimento["NomeAlimento"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label for="grams1">Quantità:</label>
                        <input type="number" id="grams1" name="grams[]" required>

                        <div class="optional-group">
                            <label for="optional1-1">Alimento Opzionale 1:</label>
                            <select id="optional1-1" name="optional[1][]" required>
                                <?php foreach ($templateparams["alimenti"] as $alimento): ?>
                                    <option value="<?php echo $alimento["NomeAlimento"] ?>">
                                        <?php echo $alimento["NomeAlimento"] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <label for="optional-grams1-1">Quantità Alimento Opzionale 1:</label>
                            <input type="text" id="optional-grams1-1" name="optional-grams[1][]" required>
                            <button type="button" class="add-optional">Aggiungi Alimento Opzionale</button>
                        </div>

                        <button type="button" class="add-group">Aggiungi Alimento</button>
                    </div>
                </section>
                <section class="exercise-section">
                    <h1>Tabella Esercizi</h1>
                    <div class="exercise-group" data-group-id="1">
                        <label for="exercise1">Nome Esercizio:</label>
                        <select id="exercise1" name="exercise[]" required>
                            <?php foreach ($templateparams["esercizi"] as $esercizio): ?>
                                <option value="<?php echo $esercizio["NomeEsercizio"] ?>">
                                    <?php echo $esercizio["NomeEsercizio"] ?>
                                </option>
                            <?php endforeach; ?>
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
                    <textarea id="advice1" name="advice[]"></textarea>
                    <button type="button" class="add-advice">Aggiungi Consiglio</button>
                </div>

                <input type="submit" value="Invia">
            </form>
        </section>
        <?php
        $mealOptions = '';
        foreach ($templateparams["pasti"] as $pasto) {
            $mealOptions .= '<option value="' . htmlspecialchars($pasto["NomePasto"]) . '">' . htmlspecialchars($pasto["NomePasto"]) . '</option>';
        }

        $foodOptions = '';
        foreach ($templateparams["alimenti"] as $alimento) {
            $foodOptions .= '<option value="' . htmlspecialchars($alimento["NomeAlimento"]) . '">' . htmlspecialchars($alimento["NomeAlimento"]) . '</option>';
        }

        $exerciseOptions = '';
        foreach ($templateparams["esercizi"] as $esercizio) {
            $exerciseOptions .= '<option value="' . htmlspecialchars($esercizio["NomeEsercizio"]) . '">' . htmlspecialchars($esercizio["NomeEsercizio"]) . '</option>';
        }
        ?>
    </main>
    <script>
        var mealOptions = `<?php echo $mealOptions; ?>`;
        var foodOptions = `<?php echo $foodOptions; ?>`;
        var exerciseOptions = `<?php echo $exerciseOptions; ?>`;
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/exit.js" type="text/javascript"></script>
    <script src="../js/aggiungiForm.js" type="text/javascript"></script>
</body>

</html>