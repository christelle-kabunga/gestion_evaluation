<?php 
include('../../connexion/connexion.php');
if(isset($_GET["idaffec"])&& !empty($_GET["idaffec"])){
    $id=$_GET["idaffec"];
$dates=date('Y-m-d');
$etudiant=htmlspecialchars($_POST["etudiant"]);
$cours=htmlspecialchars($_POST["cours"]);

$req=$connexion->prepare("UPDATE affectation set cours=?, etudiant=?, date_affec=? where id=?");
$exe=$req->execute([$etudiant,$cours,$dates,$id]);

if($exe==true){
    $_SESSION['msg']= "modification réussie";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
    header("location:../../views/affectation.php");
}else{
    header("location:../../views/affectation.php");
}

}