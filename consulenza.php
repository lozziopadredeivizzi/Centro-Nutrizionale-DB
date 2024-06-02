<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateparams["consulenza"] = $dbh->getConsulenzaTable()->getConsulenza($_SESSION["id"]);
    $templateparams["tipoConsulenza"] = $dbh->getConsulenzaTable()->getTypeConsulenza();
}
else{
    header("Location: login.php");
}

?>