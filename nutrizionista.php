<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    if (!empty($id)) {
        $templateparams["nutrizionista"] = $dbh->getNutrizionistaTable()->getNutrizionistaById($id);
        $templateparams["recensioni"] = $dbh->getRecensioniTable()->getRecensioniByNutrizionistaId($id);
        $templateparams["recensioniNutrizionista"] = $dbh->getRecensioniTable()->getRecensioniECountByNutrizionistaId($id);
    }
    $templateparams["allNutrizionisti"] = $dbh->getNutrizionistaTable()->getAllNutrizionisti();
    $templateparams["nutrizionistaAttuale"] = $dbh->getNutrizionistaTable()->getAttualNutrizionista($_SESSION["id"]);
    $templateparams["storicoNutrizionisti"] = $dbh->getNutrizionistaTable()->getStoricoNutrizionistiScelti($_SESSION["id"]);
}

?>