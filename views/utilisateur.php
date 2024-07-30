<?php 
    include '../connexion/connexion.php';//Se connecter à la BD
    #Appel de la page qui permet de faire les affichages
    require_once('../models/select/select-utilisateur.php');
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
                <!-- pour afficher les massage  -->
                <?php
                if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
                    ?><div class="alert-info alert text-center alert-dismissible fade show" role="alert">
                        <?=$_SESSION['msg']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><?php
                }
                unset($_SESSION['msg']);#Cette ligne permet de vider la valeur qui se trouve dans la session message
            ?>
                <div class="col-xl-12 ">
                    <form class="card p-3" action="<?=$url?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Nom <span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: MUHINDO" name="nom"
                                    <?php if (isset($_GET['idet'])) { ?> value="<?php echo $tab['nom']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Postnom <span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="EX: RAFIKI"
                                    name="postnom" <?php if (isset($_GET['idet'])) { ?>
                                    value="<?php echo $tab['postnom']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Prenom <span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: DAVID"
                                    name="prenom" <?php if (isset($_GET['idet'])) { ?>
                                    value="<?php echo $tab['prenom']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Genre <span class="text-danger">*</span></label>
                                <select required id="" name="genre" autocomplete="off" class="form-select">
                                    <?php 
                                    if(isset($_GET['idet'])){ 
                                        ?>
                                            
                                              <?php if($tab['genre']=='Académique')
                                              {?> 
                                               <option value="Académique" Selected>Académique</option>
                                               <option value="Feminin">Feminin</option>


                                    <?php     }
                                        else {
                                              ?>  
                                            <option value="Académique" >Académique</option>
                                            <option value="Feminin" Selected>Feminin</option>

                                        <?php }
                                    }else{ 
                                        ?>
                                            <option value="" desabled>Choisir un genre</option>
                                            <option value="Masculin">Masculin</option>
                                            <option value="Feminin">Feminin</option>
                                        <?php  
                                    } 
                                ?>
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Adresse <span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: Boutembo, Q. Kitatumba N° 16"
                                    name="adresse" <?php if (isset($_GET['idet'])) { ?>
                                    value="<?php echo $tab['adresse']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Telephone <span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: 0000000000"
                                    name="telephone" <?php if (isset($_GET['idet'])) { ?>
                                    value="<?php echo $tab['telephone']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Password <span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: 0000000000"
                                    name="pwd" <?php if (isset($_GET['idet'])) { ?>
                                    value="<?php echo $tab['pwd']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Fonction <span class="text-danger">*</span></label>
                                <select required id="" name="fonction" autocomplete="off" class="form-select">
                                    <?php 
                                    if(isset($_GET['idet'])){ 
                                        ?>
                                            
                                              <?php if($tab['genre']=='Academique')
                                              {?> 
                                               <option value="Academique" Selected>Academique</option>
                                               <option value="Chef de departement">Chef de departement</option>


                                    <?php     }
                                        else {
                                              ?>  
                                            <option value="Academique" >Academique</option>
                                            <option value="Chef de departement" Selected>Chef de departement</option>

                                        <?php }
                                    }else{ 
                                        ?>
                                            <option value="" desabled>Choisir un genre</option>
                                            <option value="Academique">Academique</option>
                                            <option value="Chef de departement">Chef de departement</option>
                                        <?php  
                                    } 
                                ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                            <label for="file" class="col-md-2 col-form-label form-control-label">Image</label>
                                            <div class="col-lg-12">
                                                <label for="file" class="custom-file">
                                                <input type="file" name="photo" id="photo" class="custom-file-input form-control" <?php if (isset($_GET['idet'])) { ?>
                                                    value="<?php echo $tab['photo']; ?> <?php }?>">
                                                <span class="custom-file-control"></span>
                                                </label>
                                            </div>
                                        </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                            <input type="submit" class="btn btn-info w-100" name="valider" value="<?=$btn?>">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- La table qui affiche les données  -->
                <div class="col-xl-12 table-responsive px-3 card mt-4 px-4 pt-3">
                     <table class="table table-borderless datatable ">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Postnom</th>
                                <th>prenom</th>
                                <th>Genre</th>
                                <th>Adresse</th>
                                <th>Tel</th>
                                <th>Fonction</th>
                                <th>Photo</th>
                                <th>Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n=0;
                                while($idet=$getData->fetch()){
                                $n++;
                                ?>
                                        <tr>
                                            <th scope="row"><?= $n;?></th>
                                            <td> <?= $idet["nom"] ?></td>
                                            <td> <?= $idet["postnom"] ?></td>
                                            <td> <?= $idet["prenom"] ?></td>
                                            <td> <?= $idet["genre"] ?></td>
                                            <td> <?= $idet["adresse"] ?></td>
                                            <td> <?= $idet["telephone"] ?></td>
                                            <td> <?= $idet["fonction"] ?></td>
                                            <td> <img src="../photo/<?= $idet["photo"] ?>"  class="img-fluid" width="50" height="30"></td>
                                            
                                            
                                            <td>
                                                <a href='utilisateur.php?idet=<?=$idet['id'] ?>' class="btn btn-info btn-sm "><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                                                    href='../models/delete/del-utilisateur-post.php?idSupcat=<?=$idet['id'] ?>'
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