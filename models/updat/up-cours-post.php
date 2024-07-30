<?php
include('../../connexion/connexion.php');

if(isset($_POST['valider']) && !empty($_GET['idpro'])){
    $id=$_GET['idpro'];
    $nomcours=htmlspecialchars($_POST['nomcours']);
    $credit=htmlspecialchars($_POST['credit']);
    $nbreheure=htmlspecialchars($_POST['nbreheure']);
    $objectif=htmlspecialchars($_POST['objectif']);
   
     //select data from database
       // verifier la validité du numero de télephone
    // $req=$connexion->prepare("UPDATE  cours SET nomcours=?,credit=?,nbreheure=?,objectif=? WHERE id='$id'");
    // $resultat=$req->execute([$nomcours,$credit,$nbreheure,$objectif,$id]);
      if(is_numeric($credit)&& is_numeric($nbreheure)){
      $req=$connexion->prepare("UPDATE cours SET nomcours=?, credit=?,nbreheure=?,objectif=? WHERE id=?");
      $resultat=$req->execute([$nomcours,$credit,$nbreheure,$objectif,$id]);
      #Si oui, la variable resultat va retourée true, donc il y a eu une modification
    if($resultat==true){
      $_SESSION['msg']= "modification réussie";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
      header("location:../../views/cours.php");
    }
} else {
    $_SESSION['msg'] = "Le nombre de crédit ou d'heure ne doit pas être une chaîne de caractère";
    header("location:../../views/cours.php");
}
  }else{
    //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à modifier
    header("location:../../views/cours.php");
  }