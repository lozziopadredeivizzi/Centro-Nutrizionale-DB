<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    $tipoConsulenza = $_POST["tipoConsulenza"];
    $svolgimento = $_POST["svolgimento"];
    $data = $_POST["data"];
    $oraInizio = $_POST["orario"];
    $oraFine = date('H:i:s', strtotime($oraInizio . ' +1 hour'));

    $codiceScheda = $dbh->addEmptyScheda($data, $_SESSION["id"]);
    if ($svolgimento == "Online") {
        $dbh->addNewConsulenza($_SESSION["id"], $oraInizio, $oraFine, $data, $codiceScheda, "n", "0", "1", $tipoConsulenza);
    } else {
        $dbh->addNewConsulenza($_SESSION["id"], $oraInizio, $oraFine, $data, $codiceScheda, "n", "1", "0", $tipoConsulenza);
    }

    header("Location: public/homepageCliente.php");

} else {
    header("Location: login.php");
}

?>