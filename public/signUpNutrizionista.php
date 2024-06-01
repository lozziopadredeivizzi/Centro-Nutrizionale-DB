<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/signUpNutrizionista.css">
    <link rel="stylesheet" href="../template/components/components.css">
    <title>Registrati - Nutrizionista</title>
</head>

<body>
    <?php require ("../bootstrap.php");
    $qualifiche = $dbh->getQualifiche(); ?>
    <header>
        <h1>Completa i campi per creare un nuovo account di tipo Nutrizionista</h1>
    </header>
    <main>
        <form action="../signUpNutrizionista.php" method="post">
            <fieldset id="infoBase">
                <legend>Informazioni di base:</legend>
                <ul>
                    <li>
                        <label for="nomeNutrizionista">Nome:</label>
                    </li>
                    <li>
                        <input type="text" name="nomeNutrizionista" id="nomeNutrizionista" required>
                    </li>
                    <li>
                        <label for="cognomeNutrizionista">Cognome:</label>
                    </li>
                    <li>
                        <input type="text" name="cognomeNutrizionista" id="cognomeNutrizionista" required>
                    </li>
                    <li>
                        <label for="emailNutrizionista">E-mail:</label>
                    </li>
                    <li>
                        <input type="text" name="emailNutrizionista" id="emailNutrizionista" required>
                    </li>
                    <li>
                        <label for="passwordNutrizionista">Password:</label>
                    </li>
                    <li>
                        <input type="password" name="passwordNutrizionista" id="passwordNutrizionista" required>
                    </li>
                </ul>
            </fieldset>
            <fieldset id="indirizzo">
                <legend>Indirizzo Professionale (opzionale):</legend>
                <ul>
                    <li>
                        <label for="cittàNutrizionista">Città:</label>
                    </li>
                    <li>
                        <input type="text" name="cittàNutrizionista" id="cittàNutrizionista">
                    </li>
                    <li>
                        <label for="capNutrizionista">CAP:</label>
                    </li>
                    <li>
                        <input type="text" name="capNutrizionista" id="capNutrizionista">
                    </li>
                    <li>
                        <label for="viaNutrizionista">Via:</label>
                    </li>
                    <li>
                        <input type="text" name="viaNutrizionista" id="viaNutrizionista">
                    </li>
                    <li>
                        <label for="civicoNutrizionista">Civico:</label>
                    </li>
                    <li>
                        <input type="text" name="civicoNutrizionista" id="civicoNutrizionista">
                    </li>
                </ul>
            </fieldset>
            <fieldset id="infoProfessionali">
                <legend>Informazioni Professionali (opzionale):</legend>
                <ul>
                    <li>
                        <label for="qualificaNutrizionista">Qualifica:</label>
                    </li>
                    <li>
                        <select id="qualificaNutrizionista" name="qualificaNutrizionista">
                            <?php foreach($qualifiche as $qualifica): ?>
                            <option value="<?php echo $qualifica["Titolo"]; ?>"><?php echo $qualifica["Titolo"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </li>
                    <li>
                        <label for="specializzazioneNutrizionista">Specializzazione:</label>
                    </li>
                    <li>
                        <textarea id="specializzazioneNutrizionista" name="specializzazioneNutrizionista" rows="4"
                            cols="50" placeholder="Scrivi qui..."></textarea>
                    </li>
                    <li>
                        <label for="expNutrizionista">Esperienza:</label>
                    </li>
                    <li>
                        <textarea id="expNutrizionista" name="expNutrizionista" rows="4" cols="50"
                            placeholder="Scrivi qui..."></textarea>
                    </li>
                    <li>
                        <label for="orariNutrizionista">Orari:</label>
                    </li>
                    <li>
                        <textarea id="orariNutrizionista" name="orariNutrizionista" rows="4" cols="50"
                            placeholder="Scrivi qui i tuoi orari di ricevimento (quello scritto verrà visulizzato direttamente al cliente)"></textarea>
                    </li>
                    <li>
                        <label for="telNutrizionista">Telefono:</label>
                    </li>
                    <li>
                        <input type="text" name="telNutrizionista" id="telNutrizionista" placeholder="telefono">
                    </li>
                </ul>
            </fieldset>
            <button class="btn" type="submit" name="Registrati" id="Registrati">Registrati</button>
        </form>
        <button class="btn" onclick="window.location.href='signUp.html'">Torna indietro</button>
    </main>
</body>

</html>