<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    if (isset($_POST["idNutrizionista"])) {
        $idNutrizionista = $_POST["idNutrizionista"];
        $dbh->impostaNutrizionista($_SESSION["id"], $idNutrizionista);
    }
} else {
    header("Location: login.php");
}
?>
