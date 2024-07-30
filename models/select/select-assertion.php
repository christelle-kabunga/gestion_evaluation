<?php
    if (isset($_GET['idassertion']) && !empty($_GET['idassertion'])){
     $id=$_GET['idassertion'];
     $getDataMod=$connexion->prepare("SELECT * FROM assertion WHERE id=?");
     $getDataMod->execute([$id]);
     $tab=$getDataMod->fetch();
    
     $url="../models/updat/up-assertion-post.php?idassertion=".$id;//Cette varible permet de savoir sur quelle page l'action va etre executée lors de la modification
     $btn="Modifier";//On chager le texte sur le button qui sert à modifier ou ajouter
     $title="Modifier Assertion";
    }
    else{
     $url="../models/add/add-assertion-post.php";//Cette varible permet de savoir sur quelle page l'action va etre executée lors de l'enregistrement. il sera mit dans l'attribut action dans le form
     $btn="Enregistrer";//On chager le texte sur le button qui sert à modifier ou ajouter
     $title="Ajouter Assertion";
    }

    #La requette qui permet de faire les affichages et recherche
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search=$_GET['search'];
        $getData=$connexion->prepare("SELECT * from assertion WHERE supprimer=? AND enonce LIKE ? ");
        $getData->execute([0,  $search."%"]);
    }
    else{
        $getData=$connexion->prepare("SELECT * from assertion WHERE supprimer=?");
        $getData->execute([0]);
    }