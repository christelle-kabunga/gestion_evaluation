<?php
    #Cette ligne permet d'étabir la connexion à la base de données
    include('../../connexion/connexion.php');
    if(isset($_POST['valider'])){
        $nomcours=htmlspecialchars($_POST['nomcours']);
        $credit=htmlspecialchars($_POST['credit']);
        $nbreheure=htmlspecialchars($_POST['nbreheure']);
        $objectif=htmlspecialchars($_POST['objectif']);
         #verifier si la cat existe ou pas dans la bd
         $getcoursDeplicant=$connexion->prepare("SELECT * FROM cours WHERE nomcours=? AND supprimer=?");
         $getcoursDeplicant->execute([$nomcours, 0]);
         $tab=$getcoursDeplicant->fetch(); 
             if($tab>0){
                 $_SESSION['msg']='ce cours existe dejà dans la base de données';//Cette variable recoit le message pour notifier l'utilisateur de l'opération qu'il deja fait
                 header("location:../../views/courss.php");
             }
             else{
        //Insertion data from database
        if (is_numeric($credit) && is_numeric($nbreheure)) {
        $req=$connexion->prepare("INSERT INTO cours( `nomcours`, `credit`, `nbreheure`, `objectif`) values (?,?,?,?)");
        $resultat=$req->execute([$nomcours,$credit,$nbreheure,$objectif]);//Il faut  stocker la requette dans la variable qui s'appel resultat, pour qu'on sache que la requette a été exequitée ou pas

        #Si oui, la variable resultat va retourée true, donc il y a eu un enregistrement
        if($resultat==true){
            $_SESSION['msg']= "Enreigistrement réussi";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
            header("location:../../views/cours.php");
        }
        else{
            $_SESSION['msg']= "Echec d'enreigistrement";//Cette ligne permet d'ajouter un message dans la session Lors qu'il n'y a aucun enregistrement
            header("location:../../views/cours.php");
        }
    } else {
        $_SESSION['msg'] = "Le nombre de crédit ou d'heure ne doit pas être une chaîne de caractère";
        header("location:../../views/cours.php");
    }
    }
    }else{
        //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à enregistrer
        header("location:../../views/cours.php");
    }
 