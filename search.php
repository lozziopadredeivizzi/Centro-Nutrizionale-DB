<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {

    if (isset($_POST["city"]) && $_POST["city"] != "" && $_POST["cap"] == "") {
        $city = $_POST["city"];
        $result = $dbh->getNutrizionistaTable()->getNutrizionistaByCity($city);
        if (empty($result)) {
            $_GET["text"] = "Nessun risultato trovato";
        } else {
            $templateparams["allNutrizionisti"] = $result;
        }
    } else if (isset($_POST["cap"]) && $_POST["cap"] != "" && $_POST["city"] == "") {
        $cap = $_POST["cap"];
        $result = $dbh->getNutrizionistaTable()->getNutrizionsitaByCAP($cap);
        if (empty($result)) {
            $_GET["text"] = "Nessun risultato trovato";
        } else {
            $templateparams["allNutrizionisti"] = $result;
        }
    } else {

    }

    if (isset($_POST["searchNearYou"])) {
        $result = $dbh->getNutrizionistaTable()->getNutrizionistiVicinoATe($_SESSION["id"]);
        if (empty($result)) {
            $_GET["text"] = "Nessun risultato trovato";
        } else {
            $templateparams["allNutrizionisti"] = $result;
        }
    }

} else {

    header("Location: login.html");
}

?>