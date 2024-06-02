<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $valutazione = $_POST["Valutazione"];
    $testo = $_POST["recensione"];
    $dbh->getRecensioniTable()->addRecensione($_SESSION["id"], $_SESSION["idNutrizionista"], $valutazione, $testo);
    $media = $dbh->getRecensioniTable()->getMediaVotiByNutrizionistaId($_SESSION["idNutrizionista"]);
    $dbh->setMediaVotiToNutrizionista($_SESSION["idNutrizionista"], $media);

    header("Location: public/profiloNutrizionistaScelto.php");
} else{
    header("Location: login.php");
}

?>