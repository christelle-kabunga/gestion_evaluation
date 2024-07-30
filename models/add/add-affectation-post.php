<?php 
include('../../connexion/connexion.php');
$dates=date('Y-m-d');
$etudiant=htmlspecialchars($_POST["etudiant"]);
$cours=htmlspecialchars($_POST["cours"]);

if (!empty($cours) && !empty($etudiant)) 
{
$req=$connexion->prepare("INSERT INTO affectation(cours,etudiant,date_affec) values(?,?,?)");
$recup=$req->execute([$cours,$etudiant,$dates]);
if ($recup == true) {
    $_SESSION['msg'] = "enregistrement réussi"; // This line allows you to add a message to the session When there has been a registration
    header("location:../../views/affectation.php");
} else {
    $_SESSION['msg'] = "Echec d'enregistrement"; // This line allows you to add a message to the session When there has been a registration
    header("location:../../views/affectation.php");
}
}else{
    header("location:../../views/affectation.php");
}


?>