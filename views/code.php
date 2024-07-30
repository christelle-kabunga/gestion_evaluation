<?php 
$annee=date('Y');
$nom="KABUNGA";
$postnom="Christelle";
$matricule=substr($nom,0,1).substr($nom,2,2).strtoupper(substr($postnom,2,2)).strtolower(substr($nom,3,1).'/'.$annee);
echo $matricule;
?>