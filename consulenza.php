<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    $templateparams["consulenza"] = $dbh->getConsulenzaTable()->getConsulenza($_SESSION["id"]);
    $templateparams["tipoConsulenza"] = $dbh->getConsulenzaTable()->getTypeConsulenza();

    if(isset($_SESSION["NSignedin"])){
        $templateparams["daFare"] = $dbh->getConsulenzaTable()->getConsulenzeDaFare($_SESSION["id"]);
    }
} else {
    header("Location: login.php");
}

?>