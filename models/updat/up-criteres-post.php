<?php
include('../../connexion/connexion.php');

if(isset($_POST['valider']) && !empty($_GET['idet'])){
    $id=$_GET['idet'];
    $desc = htmlspecialchars($_POST['desc']);
    $type = htmlspecialchars($_POST['type']);
    $domaine = htmlspecialchars($_POST['domaine']);
     //select data from database
     
      $req=$connexion->prepare("UPDATE criteres SET description=?, type=?,domaine=? WHERE id=?");
      $resultat=$req->execute([$desc,$type,$domaine,$id]);
      #Si oui, la variable resultat va retourée true, donc il y a eu une modification
    if($resultat==true){
      $_SESSION['msg']= "La modification a réussie";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
      header("location:../../views/criteres.php");
    }
  }else{
    //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à modifier
    header("location:../../views/criteres.php");
  }