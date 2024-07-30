<?php 
if(isset($_GET['idattr']) && !empty($_GET['idattr'])){
    $id=$_GET['idattr'];

    $req=$connexion->prepare("SELECT * FROM attribution where id=?");
    $req->execute([$id]);
    $tab=$req->fetch();

    $url="../models/updat/up-attribution-post.php?idattr=".$id;//Cette varible permet de savoir sur quelle page l'action va etre executée lors de la modification
     $btn="Modifier";//On chager le texte sur le button qui sert à modifier ou ajouter
     $title="Modifier attribution";
}else{
    $url="../models/add/add-attribution-post.php";//Cette varible permet de savoir sur quelle page l'action va etre executée lors de l'enregistrement. il sera mit dans l'attribut action dans le form
    $btn="Enregistrer";//On chager le texte sur le button qui sert à modifier ou ajouter
    $title="Ajouter attribution";
   }

    #La requette qui permet de faire les affichages et recherche
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search=$_GET['search'];
        $getData=$connexion->prepare("SELECT * from attribution WHERE supprimer=? AND nom LIKE ? OR postnom LIKE ? OR prenom LIKE ? 
        OR genre LIKE ? OR adresse LIKE ? OR telephone LIKE ?");
        $getData->execute([0,  $search."%", $search."%", $search."%", $search."%", $search."%", $search."%"]);
    }
    else{
        $getData=$connexion->prepare("SELECT cours.nomcours as cours ,enseignant.nom as nom,enseignant.postnom as postnom,enseignant.prenom as prenom,attribution.date_affectation as date,attribution.id as id FROM attribution,cours,enseignant WHERE attribution.cours=cours.id AND attribution.enseignant=enseignant.id and attribution.supprimer=0 AND cours.supprimer=0 AND enseignant.supprimer=0");
        $getData->execute();
    }


?>