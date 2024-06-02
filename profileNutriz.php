<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    if (isset($_POST["IDNutrizionista"])) {
        $_SESSION["idNutrizionista"] = $_POST["IDNutrizionista"];
    }
} else {
    header("Location: login.php");
}

?>