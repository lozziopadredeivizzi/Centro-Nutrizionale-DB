<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $codScheda = $_SESSION["codScheda"];
    $templateparams["scheda"] = $dbh->getSchedaTable()->getSchedaByCod($codScheda);
    $templateparams["tabAlimenti"] = $dbh->getSchedaTable()->getAlimentiTableFromScheda($codScheda);
    $templateparams["tabEsercizi"] = $dbh->getSchedaTable()->getEserciziTableFromScheda($codScheda);
    $templateparams["tabConsigli"] = $dbh->getSchedaTable()->getConsigliTableFromScheda($codScheda);
} else{
    header("Location: login.php");
}

?>