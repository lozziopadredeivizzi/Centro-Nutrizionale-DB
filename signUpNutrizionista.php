<?php

require_once ("bootstrap.php");

$nome = $_POST["nomeNutrizionista"];
$cognome = $_POST["cognomeNutrizionista"];
$emial = $_POST["emailNutrizionista"];
$password = $_POST["passwordNutrizionista"];
$citta = $_POST["cittàNutrizionista"];
$cap = $_POST["capNutrizionista"];
$via = $_POST["viaNutrizionista"];
$civico = $_POST["civicoNutrizionista"];
$qualifica = $_POST["qualificaNutrizionista"];
$specializzazione = $_POST["specializzazioneNutrizionista"];
$esperienza = $_POST["expNutrizionista"];
$orari = $_POST["orariNutrizionista"];
$telefono = $_POST["telNutrizionista"];

$id = $dbh->addNutrizionista($nome, $cognome, $emial, $password, 0, $esperienza, $specializzazione, $orari, $telefono, $qualifica, $citta, $via, $cap, $civico);
$_SESSION["id"] = $id;
header("Location: public/homepageNutrizionista.php");

?>