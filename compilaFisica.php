<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idCliente = $_SESSION["idCliente"];
        $idNutrizionista = $_SESSION["id"];
        $obiettivo = $_POST["obiettivo"];
        $durata = $_POST["durata"];

        $dbh->updateSchedaInfo($idCliente, $idNutrizionista, $durata, $obiettivo);

        // Gestione degli esercizi
        $exercises = $_POST['exercise'];
        $frequencies = $_POST['frequency'];
        $durations = $_POST['duration'];

        $dbh->addTabellaAllenamento($idCliente, $idNutrizionista);

        foreach ($exercises as $index => $exercise) {
            $exerciseName = $exercise;
            $frequency = $frequencies[$index];
            $duration = $durations[$index];
            $dbh->addExercice($idCliente, $idNutrizionista, $frequency, $duration, $exerciseName);
        }

        // Gestione dei consigli
        if (!empty($_POST['advice'])) {
            $advices = $_POST['advice'];

            $dbh->addTabellaConsigli($idCliente, $idNutrizionista);

            foreach ($advices as $index => $advice) {
                $adviceText = $advice;
                $dbh->addConsiglio($adviceText, $idCliente, $idNutrizionista);
            }
        }

        $dbh->updateConsulenza($idCliente, $idNutrizionista);
        header("Location: public/homepageNutrizionista.php");
    }
} else {
    header("Location: public/login.php");
}


?>