<?php
include('../../connexion/connexion.php');

if(isset($_POST['valider']) && !empty($_GET['idpro'])){
    $id=$_GET['idpro'];
    $nompromotion = htmlspecialchars($_POST['nompromotion']);
   
     //select data from database
     
      $req=$connexion->prepare("UPDATE promotion SET nompromotion=? WHERE id=?");
      $resultat=$req->execute([$nompromotion, $id]);
      #Si oui, la variable resultat va retourée true, donc il y a eu une modification
    if($resultat==true){
      $_SESSION['msg']= "La modification a réussie";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
      header("location:../../views/promotion.php");
    }
 
  }else{
    //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à modifier
    header("location:../../views/promotion.php");
  }