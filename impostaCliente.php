<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $_SESSION["idCliente"] = $_POST["idCliente"];
    echo json_encode(array("success" => true));
} else{
    header("Location: public/login.php");
}

?>