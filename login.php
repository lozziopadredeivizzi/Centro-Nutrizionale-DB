<?php

require_once ("bootstrap.php");
if (isset($_POST["submitCliente"])) {
    $id = $_POST["id"];
    $password = $_POST["password"];
    $check = $dbh->checkLoginCliente($id, $password);
    if ($check[0]["isPresent"] == 1) {
        $_SESSION["id"] = $id;
        header("Location: homepageCliente.php");
    }
} elseif (isset($_POST["submitNutrizionista"])) {

}

?>