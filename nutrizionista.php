<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateparams["nutrizionista"] = $dbh->getNutrizionistaTable()->getNutrizionistaById($_SESSION["idNutrizionista"]);
    $templateparams["allNutrizionisti"] = $dbh->getNutrizionistaTable()->getAllNutrizionisti();
    $templateparams["nutrizionistaAttuale"] = $dbh->getNutrizionistaTable()->getAttualNutrizionista($_SESSION["id"]);
    $templateparams["storicoNutrizionisti"] = $dbh->getNutrizionistaTable()->getStoricoNutrizionistiScelti($_SESSION["id"]);
    $templateparams["recensioniNutrizionista"] = $dbh->getRecensioniTable()->getRecensioniECountByNutrizionistaId($_SESSION["idNutrizionista"]);
}

?>