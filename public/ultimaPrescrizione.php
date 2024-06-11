<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../template/header/header.css">
    <link rel="stylesheet" href="styles/singolaPrescrizione.css">
    <title>Prescrizione Attuale</title>
</head>

<body>
    <?php include ("../template/header/headerCliente.html");
    require ("../schedaAttuale.php"); ?>
    <div>
        <h2>Obiettivo</h2>
        <p><?php echo $templateparams["scheda"][0]["Obiettivo"]; ?></p>
        <h2>Durata</h2>
        <p><?php echo $templateparams["scheda"][0]["Durata"]; ?> Settimane</p>

        <?php if(!empty($templateparams["tabAlimenti"])): ?>
        <h2>Piano Pasti</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Pasto</th>
                    <th>Quantità (gr. o porzioni)</th>
                    <th>Alimento</th>
                    <th>Opzione</th>
                    <th>Quantità (gr. o porzioni)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($templateparams["tabAlimenti"] as $alimento): ?>
                    <tr>
                        <td><?php echo $alimento["NomePasto"] ?></td>
                        <td><?php if ($alimento["QuantitaPrescr"] !== 0) {
                            echo $alimento["QuantitaPrescr"];
                        } else {
                            echo "/";
                        } ?>
                        </td>
                        <td><?php echo $alimento["NomeAlimento"] ?></td>
                        <td><?php echo $alimento["NomeAlimentoAlter"] ?></td>
                        <td><?php if ($alimento["QuantitaAlter"] !== 0) {
                            echo $alimento["QuantitaAlter"];
                        } else {
                            echo "/";
                        } ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
        
        <?php if(!empty($templateparams["tabEsercizi"])): ?>
        <h2>Piano Allenamento</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Esercizio</th>
                    <th>Durata (min. o ripetizioni)</th>
                    <th>Frequenza (settimanale)</th>
                    <th>Descrizione</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($templateparams["tabEsercizi"] as $esercizio): ?>
                <tr>
                    <td><?php echo $esercizio["NomeEsercizio"] ?></td>
                    <td><?php echo $esercizio["Durata"] ?></td>
                    <td><?php echo $esercizio["FrequenzaSettimanale"] ?></td>
                    <td><?php echo $esercizio["Descrizione"] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <?php if(!empty($templateparams["tabConsigli"])): ?>
        <h2>Note/Consigli</h2>
        <ul>
            <?php foreach($templateparams["tabConsigli"] as $consiglio): ?>
            <li><?php echo $consiglio["Descrizione"]; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/exit.js" type="text/javascript"></script>
</body>

</html>