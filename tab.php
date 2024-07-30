<?php 

$tab=[
['nom','prenom'],
['kbg,nom','kbg,prenom'],
['kite,nom','kite,prenom']
];
foreach($tab as $ligne)
{
    foreach($ligne as $valeur){
        echo $valeur ." ";
    }
    echo"<br>";
}
?>