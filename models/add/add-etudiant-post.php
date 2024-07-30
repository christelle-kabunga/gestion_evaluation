<?php
include('../../connexion/connexion.php');

if (isset($_POST['valider'])) {

    $annee=date('Y');
    $nom = htmlspecialchars($_POST['nom']);
    $postnom = htmlspecialchars($_POST['postnom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $genre = htmlspecialchars($_POST['genre']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $lieunais = htmlspecialchars($_POST['lieunais']);
    $datenais = htmlspecialchars($_POST['datenais']);
    $nationalite = htmlspecialchars($_POST['nationalite']);
    //$matricule = htmlspecialchars($_POST['matricule']);
    $matricule=substr($nom,0,1).substr($nom,2,2).strtoupper(substr($postnom,2,2)).strtolower(substr($nom,3,1).'/'.$annee);

    // Check if the student already exists in the database
    $getFourDeplicant = $connexion->prepare("SELECT * FROM etudiant WHERE telephone=? AND supprimer=?");
    $getFourDeplicant->execute([$telephone, 0]);
    $tab = $getFourDeplicant->fetch();

    if ($tab > 0) {
        $_SESSION['msg'] = 'Cet etudiant existe déjà dans la base de données'; // This variable receives the message to notify the user of the operation they have already done
        header("location:../../views/etudiant.php");
    } else {
        // Verify the validity of the phone number
        if (is_numeric($telephone)) {
            $req = $connexion->prepare("INSERT INTO etudiant( `etmatricule`, `nom`, `postnom`, `prenom`, `genre`, `telephone`, `adresse`, `lieunaissance`, `datenaissance`, `nationalite`) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $resultat = $req->execute([$matricule, $nom, $postnom, $prenom, $genre, $telephone, $adresse, $lieunais, $datenais, $nationalite]);

            // If yes, the result variable will return true, so there was a registration
            if ($resultat == true) {
                $_SESSION['msg'] = "L'enregistrement réussi"; // This line allows you to add a message to the session When there has been a registration
                header("location:../../views/etudiant.php");
            } else {
                $_SESSION['msg'] = "Echec d'enregistrement"; // This line allows you to add a message to the session When there has been a registration
                header("location:../../views/etudiant.php");
            }
        } else {
            $_SESSION['msg'] = "Le numero de téléphone ne doit pas être une chaîne de caractère";
            header("location:../../views/etudiant.php");
        }
    }
} else {
    // This line allows you to redirect the user when they have not clicked the button that is used to save
    header("location:../../views/etudiant.php");
}
