<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    $dataInizio = $_POST["data"];
    $oraInizio = $_POST["orario"];
    $disp = $dbh->getConsulenzaTable()->checkDisponibility($dataInizio,$oraInizio, $_SESSION["id"]);
    error_log($disp[0]["count"]);
    if ($disp[0]['count'] > 0) {
        echo 'non disponibile';
    } else {
        echo 'disponibile';
    }
} else {
    header("Location: login.php");
}

?>