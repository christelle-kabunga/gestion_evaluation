<?php  
include('../../connexion/connexion.php');

if(isset($_POST['valider']) && !empty($_GET['idassertion'])){
    $id=$_GET['idassertion'];
    $enonce=htmlspecialchars($_POST['enonce']);

    //requete de modification
    $req=$connexion->prepare("UPDATE assertion set enonce=? where id=?");
    $exe=$req->execute([$enonce,$id]);
    if($exe==true){
        $_SESSION['msg']="Modification réussie";
        header('location:../../views/assertion.php');
    }else{
        $_SESSION['msg']="Echec";
        header("location:../../views/assertion.php");
    }

}

?>