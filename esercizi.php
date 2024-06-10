<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateparams["esercizi"] = $dbh->getEserciziTable()->getAllExercises();
} else{
    header("Location: public/login.php");
}

?>