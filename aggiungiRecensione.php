<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    try{
$valutazione = $_POST["Valutazione"];
    $testo = $_POST["recensione"];
    $dbh->getRecensioniTable()->addRecensione($_SESSION["id"], $_SESSION["idNutrizionista"], $valutazione, $testo);
    $media = $dbh->getRecensioniTable()->getMediaVotiByNutrizionistaId($_SESSION["idNutrizionista"]);
    $dbh->setMediaVotiToNutrizionista($_SESSION["idNutrizionista"], $media);

    header("Location: public/profiloNutrizionistaScelto.php");
    } catch(Exception $e){
        echo '<script>alert("Hai già recensito questo nutrizionista.");</script>';
        header("refresh:0; url=public/profiloNutrizionistaScelto.php");
    }
    
} else{
    header("Location: login.php");
}

?>