<?php 

require("bootstrap.php");

if(isUserLoggedIn()){
    $templateparams["diario"] = $dbh->getDiarioTable()->getCurrenDiary($_SESSION["id"]);
} else{
    header("Location: login.php");
}

?>