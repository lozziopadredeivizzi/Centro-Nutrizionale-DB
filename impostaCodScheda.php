<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    if(isset($_POST["codScheda"])){
        $_SESSION["codScheda"] = $_POST["codScheda"];
    }
} else{
    header("Location: public/login.php");
}

?>