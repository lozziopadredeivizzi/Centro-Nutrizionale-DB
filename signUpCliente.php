<?php
require_once ("bootstrap.php");

$nome =$_POST["nomeCliente"];
$cognome = $_POST["cognomeCliente"];
$emailCliente = $_POST["emailCliente"];
$password = $_POST["passwordCliente"];
$citta = $_POST["cittàCliente"];
$cap = $_POST["capCliente"];

$id = $dbh->addClient($nome, $cognome, $citta, $cap, $emailCliente, $password);
$_SESSION["id"] = $id;
header("Location: public/homepageCliente.php");
?>