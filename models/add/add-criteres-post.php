<?php
include('../../connexion/connexion.php');

if (isset($_POST['valider'])) {

    $desc = htmlspecialchars($_POST['desc']);
    $type = htmlspecialchars($_POST['type']);
    $domaine = htmlspecialchars($_POST['domaine']);
    

    // Check if the student already exists in the database
    $getcriteresDeplicant = $connexion->prepare("SELECT * FROM criteres WHERE description=? AND supprimer=?");
    $getcriteresDeplicant->execute([$desc, 0]);
    $tab = $getcriteresDeplicant->fetch();

    if ($tab > 0) {
        $_SESSION['msg'] = 'Ce critere existe déjà dans la base de données'; // This variable receives the message to notify the user of the operation they have already done
        header("location:../../views/criteres.php");
    } else {
        
            $req = $connexion->prepare("INSERT INTO criteres( `description`, `type`, `domaine`) VALUES (?,?,?)");
            $resultat = $req->execute([$desc, $type, $domaine]);

            // If yes, the result variable will return true, so there was a registration
            if ($resultat == true) {
                $_SESSION['msg'] = "L'enregistrement a réussi"; // This line allows you to add a message to the session When there has been a registration
                header("location:../../views/criteres.php");
            } else {
                $_SESSION['msg'] = "Echec d'enregistrement"; // This line allows you to add a message to the session When there has been a registration
                header("location:../../views/criteres.php");
            }
       
    }
} else {
    // This line allows you to redirect the user when they have not clicked the button that is used to save
    header("location:../../views/criteres.php");
}
