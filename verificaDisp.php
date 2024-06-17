<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    $dataInizio = $_POST["data"];
    $oraInizio = $_POST["orario"];
    
    $timestampDataInizio = strtotime($dataInizio);
    $timestampAttuale = strtotime(date('Y-m-d'));

    if ($timestampDataInizio < $timestampAttuale) {
        echo 'La data di inizio non può essere minore della data attuale.';
    } else {
        $oraInizioObj = DateTime::createFromFormat('H:i', $oraInizio);
        
        $oraInizioTS = $oraInizioObj->getTimestamp();
        $ora19 = DateTime::createFromFormat('H:i', '19:00')->getTimestamp();
        $ora24 = DateTime::createFromFormat('H:i', '23:59')->getTimestamp();
        $ora00 = DateTime::createFromFormat('H:i', '00:00')->getTimestamp();
        $ora08 = DateTime::createFromFormat('H:i', '07:59')->getTimestamp();

        if (($oraInizioTS >= $ora19 && $oraInizioTS <= $ora24) || ($oraInizioTS >= $ora00 && $oraInizioTS <= $ora08)) {
            echo 'L\'orario di inizio non è valido, riporva.';
        } else {
            $disp = $dbh->getConsulenzaTable()->checkDisponibility($dataInizio, $oraInizio, $_SESSION["id"]);
            error_log($disp[0]["count"]);
            if ($disp[0]['count'] > 0) {
                echo 'non disponibile';
            } else {
                echo 'disponibile';
            }
        }
    }
    
} else {
    header("Location: login.php");
}

?>
