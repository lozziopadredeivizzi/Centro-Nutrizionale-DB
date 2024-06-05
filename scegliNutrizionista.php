<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    if (isset($_POST["idNutrizionista"])) {
        $idNutrizionista = $_POST["idNutrizionista"];
        $dbh->impostaNutrizionista($_SESSION["id"], $idNutrizionista);
        $dbh->createNewDiary($_SESSION["id"]);
    }
} else {
    header("Location: login.php");
}
?>
