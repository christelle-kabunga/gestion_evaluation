<?php
#inclusion de la page de connexion
  include('../../connexion/connexion.php');
  
// creation de l'evenement sur le bouton valider
  if(isset($_POST['valider'])){
      $nom=htmlspecialchars($_POST['nom']);
      $postnom=htmlspecialchars($_POST['postnom']);
      $prenom=htmlspecialchars($_POST['prenom']);
      $genre=htmlspecialchars($_POST['genre']);
      $adresse=htmlspecialchars($_POST['adresse']);
      $telephone=htmlspecialchars($_POST['telephone']);
      $password=htmlspecialchars($_POST['pwd']);
      $fonction=htmlspecialchars($_POST['fonction']);
      // password hashing
      // $passwordh=$password;
      // $passwordhacher=password_hash($passwordh, PASSWORD_DEFAULT);
      // recuperer l'image
      $photo=$_FILES['photo']['name'];
      $upload="../../photo/".$photo;
      move_uploaded_file($_FILES['photo']['tmp_name'],$upload);

      // verification si la variable newimage a un element
      if ($photo!=0) {
        #verifier si l'utilisateur existe ou pas dans la bd
        $getutil=$connexion->prepare("SELECT * FROM `utilisateur` WHERE telephone=? AND supprimer=?");
        $getutil->execute([$telephone, 0]);
        $tab=$getutil->fetch();
        // verification si la variable tab est superieur à zéro
          if($tab>0){
          $_SESSION['msg']='cet Utlisateur existe dejà dans la base de données';//Cette variable recoit le message pour notifier l'utilisateur de l'opération qu'il deja fait
          header("location:../../views/utilisateur.php");
          }else{
            // verifier la validité du numero de télephone
            if(is_numeric($telephone)){
            //Insertion data from database
            $req=$connexion->prepare("INSERT INTO utilisateur ( nom, postnom,prenom,genre,telephone,adresse,pwd,fonction,photo) values (?,?,?,?,?,?,?,?,?)");
            $resultat=$req->execute([$nom,$postnom,$prenom,$genre,$telephone, $adresse,$password,$fonction,$photo]);
            if($resultat==true){
              $_SESSION['msg']="Enregistrement réussie";
              header("location:../../views/utilisateur.php");
            }
            else{
              $_SESSION['msg']="Echec d'enregistrement";
              header("location:../../views/utilisateur.php");
            }
          }else{
            $_SESSION['msg']="Le numero de téléphone ne doit pas être une chaîne de caractère";
            header("location:../../views/utilisateur.php");
          }
        }
      }else {
        $_SESSION['msg']="Le format de l'image que vous avez choisi n'est pas autorisé";
        header("location:../../views/utilisateur.php");
      }

  }else{
    header("location:../../views/utilisateur.php");
  }
?>