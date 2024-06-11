<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {

    if (empty(($_SESSION["NSignedin"]))) {

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
        } else if ((isset($_POST["city"]) && $_POST["city"] != "") && (isset($_POST["cap"]) && $_POST["cap"] != "")) {
            $cap = $_POST["cap"];
            $citta = $_POST["city"];
            $result = $dbh->getNutrizionistaTable()->getNutrizionistaByCityAndCAP($citta, $cap);
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
        if (isset($_POST["nome"]) && $_POST["cognome"] == "" && $_POST["city"] == "" && $_POST["nome"] != "") {
            $nome = $_POST["nome"];
            $result = $dbh->getClienteTable()->getClienteByName($nome, $_SESSION["id"]);
            if (empty($result)) {
                $_GET["text"] = "Nessun risultato trovato";
            } else {
                $templateparams["ultimaScelta"] = $result;
            }
        } else if (isset($_POST["cognome"]) && $_POST["nome"] == "" && $_POST["city"] == "" && $_POST["cognome"] != "") {
            $cognome = $_POST["cognome"];
            $result = $dbh->getClienteTable()->getClienteBySurname($cognome, $_SESSION["id"]);
            if (empty($result)) {
                $_GET["text"] = "Nessun risultato trovato";
            } else {
                $templateparams["ultimaScelta"] = $result;
            }
        } else if (isset($_POST["city"]) && $_POST["nome"] == "" && $_POST["cognome"] == "" && $_POST["city"] != "") {
            $city = $_POST["city"];
            $result = $dbh->getClienteTable()->getClienteByCity($city, $_SESSION["id"]);
            if (empty($result)) {
                $_GET["text"] = "Nessun risultato trovato";
            } else {
                $templateparams["ultimaScelta"] = $result;
            }
        } else if (isset($_POST["nome"]) && isset($_POST["cognome"]) && $_POST["city"] == "" && $_POST["nome"] != "" && $_POST["cognome"] != "") {
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $result = $dbh->getClienteTable()->getClienteByNameAndSurname($nome, $cognome, $_SESSION["id"]);
            if (empty($result)) {
                $_GET["text"] = "Nessun risultato trovato";
            } else {
                $templateparams["ultimaScelta"] = $result;
            }
        } else if (isset($_POST["nome"]) && isset($_POST["city"]) && $_POST["cognome"] == "" && $_POST["nome"] != "" && $_POST["city"] != "") {
            $nome = $_POST["nome"];
            $city = $_POST["city"];
            $result = $dbh->getClienteTable()->getClienteByNameAndCity($nome, $city, $_SESSION["id"]);
            if (empty($result)) {
                $_GET["text"] = "Nessun risultato trovato";
            } else {
                $templateparams["ultimaScelta"] = $result;
            }
        } else if (isset($_POST["cognome"]) && isset($_POST["city"]) && $_POST["nome"] == "" && $_POST["cognome"] != "" && $_POST["city"] != "") {
            $cognome = $_POST["cognome"];
            $city = $_POST["city"];
            $result = $dbh->getClienteTable()->getClienteBySurnameAndCity($cognome, $city, $_SESSION["id"]);
            if (empty($result)) {
                $_GET["text"] = "Nessun risultato trovato";
            } else {
                $templateparams["ultimaScelta"] = $result;
            }
        } else if (isset($_POST["cognome"]) && isset($_POST["city"]) && isset($_POST["nome"]) && $_POST["cognome"] != "" && $_POST["city"] != "" && $_POST["nome"] != "") {
            $cognome = $_POST["cognome"];
            $city = $_POST["city"];
            $nome = $_POST["nome"];
            $result = $dbh->getClienteTable()->getClienteByNameSurnameAndCity($nome, $cognome, $city, $_SESSION["id"]);
            if (empty($result)) {
                $_GET["text"] = "Nessun risultato trovato";
            } else {
                $templateparams["ultimaScelta"] = $result;
            }
        }

    }

} else {

    header("Location: login.html");
}

?>