<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateparams["nutrizionista"] = $dbh->getNutrizionistaTable()->getNutrizionistaById($id);
    $templateparams["allNutrizionisti"] = $dbh->getNutrizionistaTable()->getAllNutrizionisti();
}

?>