<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    if (isset($id)) {
        $templateparams["cliente"] = $dbh->getClienteTable()->getClienteById($id);
        $templateparams["checkScelta"] = $dbh->getNutrizionistaTable()->isSceltaPresent($id);
        $templateparams["nConsulenze"] = $dbh->getClienteTable()->getNumberOfConsulenze($id, $_SESSION["id"]);
    }

    if (isset($_SESSION["NSignedin"])) {
        $templateparams["ultimaScelta"] = $dbh->getClienteTable()->checkIfYouAreLastChoice($_SESSION["id"]);
    }
} else{
    header("Location: login.php");
}
?>