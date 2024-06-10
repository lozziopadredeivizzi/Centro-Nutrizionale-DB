<?php

require_once("bootstrap.php");

if (isUserLoggedIn()) {
    if (!isset($_SESSION["NSignedin"])) {
        $templateparams["diario"] = $dbh->getDiarioTable()->getCurrenDiary($_SESSION["id"]);
    } else{
        $templateparams["diario"] = $dbh->getDiarioTable()->getCurrenDiary($_SESSION["idCliente"]);
    }
} else {
    header("Location: login.php");
}

?>