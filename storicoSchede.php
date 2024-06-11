<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateparams["storico"] = $dbh->getSchedaTable()->getStoricoSchede($_SESSION["id"]);
} else{
    header("Location: login.php");
}

?>