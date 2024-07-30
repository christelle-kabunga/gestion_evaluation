<?php
  include('../../connexion/connexion.php');

  if (isset($_GET['idSupcat']) && !empty($_GET['idSupcat'])) {
    $id=$_GET['idSupcat'];
    $supprimer=1;
    $req=$connexion->prepare("UPDATE enseignant SET supprimer=? WHERE id=?");
    $resultat=$req->execute([$supprimer,$id]);
    #Si oui, la variable resultat va retourée true, donc il y a eu une modification
    if($resultat==true){
      $_SESSION['msg']= "Suppression réussi";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
      header("location:../../views/enseignant.php");
    }
    else{
        $_SESSION['msg']= "Echec de Supression";//Cette ligne permet d'ajouter un message dans la session Lors qu'il n'y a aucune modification
        header("location:../../views/enseignant.php");
    }
  }else{
    header("location:../../views/enseignant.php");
  }