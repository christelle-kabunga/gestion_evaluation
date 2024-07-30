<?php 
include('../../connexion/connexion.php');
$dates=date('Y-m-d');
$enseignant=htmlspecialchars($_POST["enseignant"]);
$cours=htmlspecialchars($_POST["cours"]);

if (!empty($cours) && !empty($enseignant)) 
{
$req=$connexion->prepare("INSERT INTO attribution(cours,enseignant,date_affectation) values(?,?,?)");
$recup=$req->execute([$cours,$enseignant,$dates]);
if ($recup == true) {
    $_SESSION['msg'] = "enregistrement réussi"; // This line allows you to add a message to the session When there has been a registration
    header("location:../../views/attribution.php");
} else {
    $_SESSION['msg'] = "Echec d'enregistrement"; // This line allows you to add a message to the session When there has been a registration
    header("location:../../views/attribution.php");
}
}else{
    header("location:../../views/attribution.php");
}


?>