<?php
    #Cette ligne permet d'étabir la connexion à la base de données
    include('../../connexion/connexion.php');
    if(isset($_POST['valider'])){
        $enonce=htmlspecialchars($_POST['enonce']);
         #verifier si la cat existe ou pas dans la bd
         $getassertionDeplicant=$connexion->prepare("SELECT * FROM assertion WHERE enonce=? AND supprimer=?");
         $getassertionDeplicant->execute([$enonce, 0]);
         $tab=$getassertionDeplicant->fetch(); 
             if($tab>0){
                 $_SESSION['msg']='cet assertion existe dejà dans la base de données';//Cette variable recoit le message pour notifier l'utilisateur de l'opération qu'il deja fait
                 header("location:../../views/assertion.php");
             }
             else{
        //Insertion data from database
        $req=$connexion->prepare("INSERT INTO assertion(`enonce`) values (?)");
        $resultat=$req->execute([$enonce]);//Il faut  stocker la requette dans la variable qui s'appel resultat, pour qu'on sache que la requette a été exequitée ou pas

        #Si oui, la variable resultat va retourée true, donc il y a eu un enregistrement
        if($resultat==true){
            $_SESSION['msg']= "L'enreigistrement a réussi";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
            header("location:../../views/assertion.php");
        }
        else{
            $_SESSION['msg']= "Echec d'enreigistrement";//Cette ligne permet d'ajouter un message dans la session Lors qu'il n'y a aucun enregistrement
            header("location:../../views/assertion.php");
        }
    }
    }else{
        //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à enregistrer
        header("location:../../views/assertion.php");
    }
 