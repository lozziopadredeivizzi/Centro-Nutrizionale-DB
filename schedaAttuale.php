<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateparams["scheda"] = $dbh->getSchedaTable()->getActualScheda($_SESSION["id"]);
    $templateparams["tabAlimenti"] = $dbh->getSchedaTable()->getAlimentiTableFromScheda($templateparams["scheda"][0]["CodiceScheda"]);
    $templateparams["tabEsercizi"] = $dbh->getSchedaTable()->getEserciziTableFromScheda($templateparams["scheda"][0]["CodiceScheda"]);
    $templateparams["tabConsigli"] = $dbh->getSchedaTable()->getConsigliTableFromScheda($templateparams["scheda"][0]["CodiceScheda"]);
} else{
    header("Location: login.php");
}

?>