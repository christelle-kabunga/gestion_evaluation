<?php 
      include('connexion/connexion.php');

      if (isset($_POST['suivant'])) {
        $cours=htmlspecialchars($_POST['cours']);
        header("Location: choisirens.php?idcours=$cours");

      }

 ?>