<?php 
include('../../connexion/connexion.php');
if(isset($_GET["idattr"]) && !empty($_GET["idattr"])){
    $id=$_GET["idattr"];
$dates=date('Y-m-d');
$enseignant=htmlspecialchars($_POST["enseignant"]);
$cours=htmlspecialchars($_POST["cours"]);

$req=$connexion->prepare("UPDATE attribution set cours=?, enseignant=?, date_affectation=? where id=?");
$exe=$req->execute([$enseignant,$cours,$dates,$id]);

if($exe==true){
    $_SESSION['msg']= "modification réussie";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
    header("location:../../views/attribution.php");
}else{
    header("location:../../views/attribution.php");
}

}