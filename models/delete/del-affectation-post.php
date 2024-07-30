<?php
  include('../../connexion/connexion.php');

  if (isset($_GET['idSup']) && !empty($_GET['idSup'])) {
    $id=$_GET['idSup'];
    $supprimer=1;
    $req=$connexion->prepare("UPDATE affectation SET supprimer=? WHERE id=?");
    $resultat=$req->execute([$supprimer,$id]);
    #Si oui, la variable resultat va retourée true, donc il y a eu une modification
    if($resultat==true){
      $_SESSION['msg']= "Suppression réussi";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
      header("location:../../views/affectation.php");
    }
    else{
        $_SESSION['msg']= "Echec de Suppression";//Cette ligne permet d'ajouter un message dans la session Lors qu'il n'y a aucune modification
        header("location:../../views/affectation.php");
    }
  }
  else{
    header("location:../../views/affectation.php");
  }