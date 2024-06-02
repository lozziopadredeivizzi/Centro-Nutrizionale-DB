<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    if (isset($_POST["controllaDisp"])) {
        $svolgimento = $_POST["svolgimento"];
        $tipo = $_POST["tipoConsulenza"];
        $data = $_POST["data"];
        $oraInizio = $_POST["orario"];
        echo $svolgimento, $tipo, $data, $oraInizio;
    }
} else {
    header("Location: login.php");
}

?>