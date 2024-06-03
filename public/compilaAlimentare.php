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
                <section>
                    <h1>Tabella Alimenti</h1>
                    <div class="input-group" data-group-id="1">
                        <label for="meal1">Pasto:</label>
                        <select id="meal1" name="meal[]" required>
                            <option value="colazione">Colazione</option>
                            <option value="pranzo">Pranzo</option>
                            <option value="cena">Cena</option>
                            <option value="spuntino">Spuntino</option>
                        </select>

                        <label for="prescribed1">Alimento:</label>
                        <select id="prescribed1" name="prescribed[]" required>
                            <option value="alimento_prescritto1">Alimento Prescritto 1</option>
                            <option value="alimento_prescritto2">Alimento Prescritto 2</option>
                            <option value="alimento_prescritto3">Alimento Prescritto 3</option>
                        </select>

                        <label for="grams1">Quantità:</label>
                        <input type="number" id="grams1" name="grams[]" required>

                        <div class="optional-group">
                            <label for="optional1-1">Alimento Opzionale 1:</label>
                            <select id="optional1-1" name="optional[1][]" required>
                                <option value="alimento1">Alimento 1</option>
                                <option value="alimento2">Alimento 2</option>
                                <option value="alimento3">Alimento 3</option>
                            </select>
                            <label for="optional-grams1-1">Quantità Alimento Opzionale 1:</label>
                            <input type="text" id="optional-grams1-1" name="optional-grams[1][]" required>
                            <button type="button" class="add-optional">Aggiungi Alimento Opzionale</button>
                        </div>

                        <button type="button" class="add-group">Aggiungi Alimento</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/exit.js" type="text/javascript"></script>
    <script src="../js/aggiungiAlimento.js" type="text/javascript"></script>
</body>

</html>