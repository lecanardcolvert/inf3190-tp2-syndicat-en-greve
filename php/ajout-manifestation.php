<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

<meta name="description" content="Ajouter une manifestation du SPWVM">

<?php include 'head.php'; ?>

<title>SPWVM - Ajouter une manifestation</title>

</head>

<!-- Début du corps -->
<body id="bodystyle">

<?php include 'header.php'; ?>

<?php include 'navigation.php'; ?>

	<main role="main">
		<div class="container">
			<!-- Début du contenu -->

			<h2 class="mb-3">Ajouter une manifestation</h2>

			<p>Veuillez remplir le formulaire ci-dessous pour ajouter une
				manifestation.</p>

<?php
require 'config.php';
require 'lib/Medoo.php';
require 'lib/Lieu.php';
require 'lib/Manifestation.php';
require 'lib/Membre.php';
use Medoo\Medoo;
use Lieu\Lieu;
use Manifestation\Manifestation;
use Membre\Membre;

const MSG_OK = "Manifestation ajout&eacute; avec succ&egrave;s.";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $msg_error = NULL;
    $valid = FALSE;
    $lieu = $_POST['lieu'];
    $membre = $_POST['membre'];
    $date = $_POST['date'];

    try {

        // Create new object
        $manifestation = new Manifestation($lieu, $membre, $date);

        // Connect to database
        $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => DB_NAME,
            'server' => DB_SERVER,
            'username' => DB_USERNAME,
            'password' => DB_PASSWORD
        ]);

        // Save to database
        $database->insert("manifestations", [
            "lieux" => $manifestation->getLieu(),
            "membre" => $manifestation->getMembre(),
            "date" => $manifestation->getDate()
        ]);

        // TODO : CHECK RESPONSE FROM DATABASE

        $valid = TRUE;
    } catch (Exception $e) {

        $msg_error = $e->getMessage();
    }

    // Display result
    if ($valid == true) {

        // Operation successful
        echo '<div class="col-md-6 mt-4 alert alert-success" role="alert">';
        echo MSG_OK;
        echo '</div>';
    } else {

        // Operation failed
        echo '<div class="col-md-6 mt-4 alert alert-warning" role="alert">';
        echo $msg_error;
        echo '</div>';
    }
}

?>

		<div class="col-md-6 pt-3 pb-3 border bg-light">
				<form method="post" action="./ajout-manifestation.php" target="_self"
					name="formAjoutManifestation">
					<!-- Début du formulaire -->

					<div class="form-group">
						<label for="lieu" class="mandatoryinput">Nom du lieu</label> <select
							class="custom-select" name="lieu">
						
<?php

// Connect to database
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => DB_NAME,
    'server' => DB_SERVER,
    'username' => DB_USERNAME,
    'password' => DB_PASSWORD
]);

// Get list of Lieu
$datas = $database->select(TABLE_LIEU, [
    "id",
    "nom"
]);

// Display all Lieu
foreach ($datas as $data) {
    echo '<option value="' . $data["id"] . '" selected>' . $data["nom"] . '</option>';
}

?>
						</select>

					</div>

					<div class="form-group">
						<label for="membre" class="mandatoryinput">Nom du membre
							d&eacute;sign&eacute;</label> <select class="custom-select"
							name="membre">
						
<?php

// Connect to database
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => DB_NAME,
    'server' => DB_SERVER,
    'username' => DB_USERNAME,
    'password' => DB_PASSWORD
]);

// Get list of Membre
$datas = $database->select(TABLE_MEMBRE, [
    "id",
    "nom",
    "prenom"
]);

// Display all Membre
foreach ($datas as $data) {
    echo '<option value="' . $data["id"] . '" selected>' . $data["prenom"] . ' '. $data["nom"] . '</option>';
}

?>

						</select>

					</div>

					<div class="form-group">
						<label for="datenaissance">Date de l'&eacute;v&eacute;nement</label>
						<input type="date" class="form-control" id="date" name="date" />
					</div>

					<button type="submit" class="btn btn-primary">Ajouter</button>

					<button type="reset" class="btn btn-danger">Effacer</button>

					<!-- Fin du formulaire -->
				</form>
			</div>

			<!-- Fin du contenu -->
		</div>
	</main>

<?php include 'footer.php'; ?>

</body>
</html>