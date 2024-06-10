<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateparams["obiettivi"] = $dbh->getObiettiviTable()->getAllObiettivi();
} else{
    header("Location: public/login.php");
}


?>