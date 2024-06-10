<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    if (isset($_POST["idCliente"])) {
        $_SESSION["idCliente"] = $_POST["idCliente"];
    }
} else{
    header("Location: public/login.php");
}

?>