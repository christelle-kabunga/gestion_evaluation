<?php
include('../../connexion/connexion.php');

if(isset($_POST['valider']) && !empty($_GET['idet'])){
    $id=$_GET['idet'];
    $nom = htmlspecialchars($_POST['nom']);
    $postnom = htmlspecialchars($_POST['postnom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $genre = htmlspecialchars($_POST['genre']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $lieunais = htmlspecialchars($_POST['lieunais']);
    $datenais = htmlspecialchars($_POST['datenais']);
    $nationalite = htmlspecialchars($_POST['nationalite']);
    $matricule = htmlspecialchars($_POST['matricule']);
   
     //select data from database
       // verifier la validité du numero de télephone
      if(is_numeric($telephone)){
      $req=$connexion->prepare("UPDATE etudiant SET etmatricule=?, nom=?,postnom=?,prenom=?,genre=?,adresse=?,telephone=?,lieunaissance=?,datenaissance=?,nationalite=? WHERE id=?");
      $resultat=$req->execute([$matricule,$nom,$postnom,$prenom,$genre,$adresse,$telephone,$lieunais,$datenais,$nationalite, $id]);
      #Si oui, la variable resultat va retourée true, donc il y a eu une modification
    if($resultat==true){
      $_SESSION['msg']= "modification réussie";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
      header("location:../../views/etudiant.php");
    }
  }else{
    $_SESSION['msg']="Le numero de téléphone ne doit pas être une chaîne de caractère";
    header("location:../../views/etudiant.php");
  }
  }else{
    //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à modifier
    header("location:../../views/etudiant.php");
  }