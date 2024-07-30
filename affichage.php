<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Select</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php
include('connexion/connexion.php');

// Récupérer les paramètres du cours et de l'enseignant (si nécessaires)
$cours = $_GET['idcours'];
$enseignant = $_GET['idens'];

if (isset($_POST['save'])) {
    $connexion->beginTransaction();

    try {
        $commentaire = $_POST['commentaire'] ?? '';

        // Insérer une nouvelle évaluation
        $insertEvaluation = $connexion->prepare("INSERT INTO evaluation (commentaire) VALUES (?)");
        $insertEvaluation->execute([$commentaire]);
        $evaluationId = $connexion->lastInsertId();

        // Préparer la requête pour vérifier l'existence d'un enregistrement
        $checkExistence = $connexion->prepare("SELECT COUNT(*) FROM evaluation_details WHERE evaluation_id = :evaluation_id AND critere_id = :critere_id AND assertion_id = :assertion_id");

        // Récupérer les réponses sélectionnées et les insérer
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'radio_') === 0) {
                $critereId = explode('_', $key)[1];
                $assertionId = $value;

                $checkExistence->execute([':evaluation_id' => $evaluationId, ':critere_id' => $critereId, ':assertion_id' => $assertionId]);
                $count = $checkExistence->fetchColumn();

                if ($count === 0) {
                    $insertDetail = $connexion->prepare("INSERT INTO evaluation_details (evaluation_id, critere_id, assertion_id) VALUES (?, ?, ?)");
                    $insertDetail->execute([$evaluationId, $critereId, $assertionId]);
                } else {
                    // Gérer le cas où l'enregistrement existe déjà
                    echo "L'évaluation pour le critère $critereId existe déjà.";
                }
            }
        }

        $connexion->commit();
        echo "Évaluation enregistrée avec succès.";
    } catch (PDOException $e) {
        $connexion->rollBack();
        echo "Une erreur s'est produite lors de l'enregistrement : " . $e->getMessage();
    }
}
?>
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="container mt-5">

                            <div class="col-12 text-center">

                                <h4 class="">Évaluation des enseignants</h4>

                                <p>Merci de prendre quelques minutes pour évaluer les enseignants que vous avez eus ce
                                    semestre. Vos réponses nous aideront à améliorer la qualité de l'enseignement.</p>

                            </div>

                            <!-- pour afficher les massage  -->
                            <?php
                if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
                    ?><div class="alert-info alert text-center alert-dismissible fade show" role="alert">
                                <?=$_SESSION['msg']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div><?php
                }
                unset($_SESSION['msg']);#Cette ligne permet de vider la valeur qui se trouve dans la session message
            ?>
                            <h1></h1>

                            <form id="evaluationForm" class="mx-auto" method="POST">
                                <?php
    $getdata = $connexion->prepare("SELECT * from criteres WHERE supprimer=?");
    $getdata->execute([0]);

    while ($get = $getdata->fetch()) {
        ?>
                                <div class="form-group">
                                    <label for="critere1"><b><?= $get["description"] ?></b></label>
                                    <?php
            $getdat = $connexion->prepare("SELECT * from assertion WHERE supprimer=?");
            $getdat->execute([0]);

            $isFirstAssertion = true; // Flag to track the first assertion

            while ($gett = $getdat->fetch()) {
                ?>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id=""
                                            name="radio_<?= $get['id'] ?>" value="<?= $gett["enonce"] ?>"
                                            data-critere-id="<?= $get['id'] ?>"
                                            <?= $isFirstAssertion ? 'checked' : '' ?>>
                                        <label class="form-check-label"
                                            for="critere1Bien"><?= $gett["enonce"] ?></label>
                                    </div>

                                    <?php
                $isFirstAssertion = false; // Reset flag for subsequent assertions
            }
            ?>
                                </div>
                                <?php
    }
  ?>

                                <div class="form-group">
                                    <label for="commentaire"><b>Commentaire (facultatif)</b></label>
                                    <textarea class="form-control" id="commentaire" name="commentaire" rows="3"
                                        placeholder="Ecrire votre Commentaire ici..."></textarea>
                                </div>
                                <button type="submit" name="save" class="btn btn-primary mt-3">Envoyer
                                    l'évaluation</button>
                            </form>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>