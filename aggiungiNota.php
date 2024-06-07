<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $nota = $_POST["descrizione"];
    $azione = $_POST["azione"];
    $data = date("Y-m-d");
    $ora = date("H:i:s");

    $dbh->addNota($_SESSION["id"], $azione, $nota, $data, $ora);
    header("Location: public/diario.php");
} else{
    header("Location: public/login.php");
}


?>