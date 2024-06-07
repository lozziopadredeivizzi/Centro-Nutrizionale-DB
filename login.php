<?php

require_once ("bootstrap.php");
if (isset($_POST["submitCliente"])) {
    $id = $_POST["id"];
    $password = $_POST["password"];
    $check = $dbh->checkLoginCliente($id, $password);
    if ($check[0]["isPresent"] == 1) {
        $_SESSION["id"] = $id;
        header("Location: homepageCliente.php");
    } else {
        echo "<script>alert('Login fallito. Controlla il tuo ID e la tua password.');</script>";
    }
} elseif (isset($_POST["submitNutrizionista"])) {
    $id = $_POST["id"];
    $password = $_POST["password"];
    $check = $dbh->checkLoginNutrizionista($id, $password);
    if ($check[0]["isPresent"] == 1) {
        $_SESSION["id"] = $id;
        $_SESSION["NSignedin"] = $id;
        header("Location: homepageNutrizionista.php");
    } else {
        echo "<script>alert('Login fallito. Controlla il tuo ID e la tua password.');</script>";
    }
}

?>