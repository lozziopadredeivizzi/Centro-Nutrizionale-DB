<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $id = $_SESSION["id"];
    $templateparams["nutrizionista"] = $dbh->getNutrizionistaTable()->getNutrizionistaById($id);
    $templateparams["info"] = $dbh->getNutrizionistaTable()->getNutrizionistaInfoById($id);
}

?>