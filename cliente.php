<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $id = $_SESSION["id"];
    $templateparams["cliente"] = $dbh->getClienteTable()->getClienteById($id);
}
?>