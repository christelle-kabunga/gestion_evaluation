<?php
  include('../../connexion/connexion.php');

  if(isset($_POST['valider']) && !empty($_GET['idet'])){
    $id=$_GET['idet'];
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $genre=htmlspecialchars($_POST['genre']);
    $adresse=htmlspecialchars($_POST['adresse']);
    $telephone=htmlspecialchars($_POST['telephone']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $fonction=htmlspecialchars($_POST['fonction']);
    $photo=$_FILES['photo']['name'];
    $upload="../../photo/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);

    //select data from database
      
     if(is_numeric($telephone)){ 
     $req=$connexion->prepare("UPDATE `utilisateur` SET  nom=?,postnom=?,prenom=?,genre=?,adresse=?,telephone=?,pwd=?, fonction=?, photo=? WHERE id='$id'");
    $resultat=$req->execute([$nom,$postnom,$prenom,$genre,$adresse,$telephone,$pwd, $fonction, $photo]);
    if($resultat==true){
      $msg="Modification réussie";
      $_SESSION['msg']=$msg;
      header("location:../../views/utilisateur.php");
    }
  }else{
    $_SESSION['msg']="Le numero de téléphone ne doit pas être une chaîne de caractère";
    header("location:../../views/utilisateur.php");
  }
  }
  else{
    header("location:../../views/utilisateur.php");
  }
?>