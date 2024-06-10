<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateparams["alimenti"] = $dbh->getAlimentiTable()->getAllAlimenti();
    $templateparams["pasti"] = $dbh->getAlimentiTable()->getAllPasti();
} else{
    header("Location: public/login.php");
}

?>