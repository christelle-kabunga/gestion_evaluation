<?php 
    include '../connexion/connexion.php';//Se connecter à la BD
    #Appel de la page qui permet de faire les affichages
    require_once('../models/select/select-cours.php');
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?=$title?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php require_once('style.php'); ?>

</head>

<body>

    <!-- Appel de menues  -->
    <?php require_once('aside.php') ?>

    <main id="main" class="main">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                <h4 class=""><?=$title?></h4>
                </div>
                <!-- La table qui affiche les données  -->
                <div class="col-xl-12 table-responsive px-3 card mt-4 px-4 pt-3">
                     <table class="table table-borderless datatable ">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>cours</th>
                                <th>Enseignant</th>
                                <th>Questions & Critères</th>
                                <th>Promotion</th>
                                <th>Departement</th>
                                <th>Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n=0;
                                while($idpro=$getData->fetch()){
                                $n++;
                                ?>
                                        <tr>
                                            <th scope="row"><?= $n;?></th>
                                            <td> <?= $idpro["nomcours"] ?></td>
                                            <td> <?= $idpro["credit"] ?></td>
                                            <td> <?= $idpro["nbreheure"] ?></td>
                                            <td> <?= $idpro["objectif"] ?></td>
                                            <td> <?= $idpro["objectif"] ?></td>
                                            
                                            <td>
                                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                                                    href='../models/delete/del-cours-post.php?idSupcat=<?=$idpro['id'] ?>'
                                                    class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </main><!-- End #main -->
    <?php require_once('script.php') ?>

</body>

</html>