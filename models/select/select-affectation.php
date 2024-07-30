<?php 
if(isset($_GET['idaffec']) && !empty($_GET['idaffec'])){
    $id=$_GET['idaffec'];

    $req=$connexion->prepare("SELECT * FROM affectation where id=?");
    $req->execute([$id]);
    $tab=$req->fetch();

    $url="../models/updat/up-affectation-post.php?idaffec=".$id;//Cette varible permet de savoir sur quelle page l'action va etre executée lors de la modification
     $btn="Modifier";//On chager le texte sur le button qui sert à modifier ou ajouter
     $title="Modifier affectation";
}else{
    $url="../models/add/add-affectation-post.php";//Cette varible permet de savoir sur quelle page l'action va etre executée lors de l'enregistrement. il sera mit dans l'attribut action dans le form
    $btn="Enregistrer";//On chager le texte sur le button qui sert à modifier ou ajouter
    $title="Ajouter affectation";
   }

    #La requette qui permet de faire les affichages et recherche
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search=$_GET['search'];
        $getData=$connexion->prepare("SELECT * from affectation WHERE supprimer=? AND nom LIKE ? OR postnom LIKE ? OR prenom LIKE ? 
        OR genre LIKE ? OR adresse LIKE ? OR telephone LIKE ?");
        $getData->execute([0,  $search."%", $search."%", $search."%", $search."%", $search."%", $search."%"]);
    }
    else{
        $getData=$connexion->prepare("SELECT cours.nomcours as cours,etudiant.nom as nom,etudiant.postnom as postnom,etudiant.prenom as prenom,affectation.date_affec as date,affectation.id as id FROM affectation,cours,etudiant WHERE affectation.cours=cours.id AND affectation.etudiant=etudiant.id and affectation.supprimer=0");
        $getData->execute();
    }


?>