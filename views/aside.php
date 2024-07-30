
<?php
    //include '../connexion/connexion.php';
  // if(!isset($_SESSION['iduser']) || empty($_SESSION['iduser'])) { header("location:ops.php"); }
?>
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <span class="d-none d-lg-block">UAC</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get">
            <input autocomplete="off" type="text" name="search" placeholder="Recherche..." title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?php if(isset($_SESSION['image'])){print '../assets/img/profiles/'. $_SESSION['image']; } ?>" width="35" height="35" alt="Profile" class="rounded-circle ">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['noms'];?></span>
                </a><!-- End Profile Iamge Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo $_SESSION['noms'];?></h6>
                        <span>Web Designer</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="../models/log-out.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Deconnexion</span>
                        </a>
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="index.php">
                <i class="bi bi-grid text-dark"></i>
                <span>Accueil</span>
            </a>
        </li><!-- End Dashboard Nav -->
    
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="promotion.php">
                <i class="bi bi-bookmark-plus text-dark"></i>
                <span>Promotion</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
                    <a class="nav-link bg-transparent text-dark " href="cours.php">
                        <i class="bi bi-credit-card text-dark"></i>
                        <span>Cours</span>
                    </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="etudiant.php">
                <i class="bi bi-person-circle text-dark"></i>
                <span>Etudiants</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="enseignant.php">
                <i class="bi bi-person-circle text-dark"></i>
                <span>Enseignants</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="departement.php">
                <i class="bi bi-shop text-dark"></i>
                <span>Département</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="criteres.php">
                <i class="bi bi-bag-plus text-dark"></i>
                <span>Critères</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="assertion.php">
                <i class="bi bi-shop text-dark"></i>
                <span>Assertions</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="attribution.php">
                <i class="bi bi-chevron-double-right text-dark"></i>
                <span>Attribution</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="affectation.php">
                <i class="bi bi-chevron-double-right text-dark"></i>
                <span>Affectation</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="utilisateur.php">
                <i class="bi bi-people-fill text-dark"></i>
                <span>Utilisateurs</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link bg-transparent text-dark " href="commentaire.php">
                <i class="bi bi-chat-left-text text-dark"></i>
                <span> Voir les Commentaires</span>
                <span class="badge bg-primary badge-number">3</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Rappors</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Rapport 1</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
    
                <li class="nav-item">
                    <a class="nav-link bg-transparent text-dark " href="client.php">
                        <i class="bi bi-person-walking text-dark"></i>
                        <span>Clients</span>
                    </a>
                </li><!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link bg-transparent text-dark " href="commande.php">
                        <i class="bi bi-terminal-plus text-dark"></i>
                        <span>Commandes</span>
                    </a>
                </li><!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link bg-transparent text-dark " href="dettes.php">
                        <i class="bi bi-credit-card-2-front-fill text-dark"></i>
                        <span>Dettes</span>
                    </a>
                </li><!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link bg-transparent text-dark " href="paiement-dettes.php">
                        <i class="bi bi-credit-card-2-front-fill text-dark"></i>
                        <span>Paiement_Dettes</span>
                    </a>
                </li><!-- End Dashboard Nav -->

    





    </ul>
</aside><!-- End Sidebar-->