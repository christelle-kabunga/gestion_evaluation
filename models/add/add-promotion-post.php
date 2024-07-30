<?php
    #Cette ligne permet d'étabir la connexion à la base de données
    include('../../connexion/connexion.php');
    if(isset($_POST['valider'])){
        $nompromotion=htmlspecialchars($_POST['nompromotion']);
         #verifier si la cat existe ou pas dans la bd
         $getpromotionDeplicant=$connexion->prepare("SELECT * FROM promotion WHERE nompromotion=? AND supprimer=?");
         $getpromotionDeplicant->execute([$nompromotion, 0]);
         $tab=$getpromotionDeplicant->fetch(); 
             if($tab>0){
                 $_SESSION['msg']='cette promotion existe dejà dans la base de données';//Cette variable recoit le message pour notifier l'utilisateur de l'opération qu'il deja fait
                 header("location:../../views/promotion.php");
             }
             else{
        //Insertion data from database
        $req=$connexion->prepare("INSERT INTO promotion(`nompromotion`) values (?)");
        $resultat=$req->execute([$nompromotion]);//Il faut  stocker la requette dans la variable qui s'appel resultat, pour qu'on sache que la requette a été exequitée ou pas

        #Si oui, la variable resultat va retourée true, donc il y a eu un enregistrement
        if($resultat==true){
            $_SESSION['msg']= "L'enreigistrement réussi";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
            header("location:../../views/promotion.php");
        }
        else{
            $_SESSION['msg']= "Echec d'enreigistrement";//Cette ligne permet d'ajouter un message dans la session Lors qu'il n'y a aucun enregistrement
            header("location:../../views/promotion.php");
        }
    }
    }else{
        //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à enregistrer
        header("location:../../views/promotion.php");
    }
 