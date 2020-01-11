<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

<meta name="description" content="Ajouter un membre au SPWVM">

<?php include 'head.php'; ?>

<title>SPWVM - Ajouter un membre</title>

</head>

<!-- Dàbut du corps -->
<body id="bodystyle">

<?php include 'header.php'; ?>

<?php include 'navigation.php'; ?>

	<main role="main">
		<div class="container">
			<!-- Dàbut du contenu -->

			<h2 class="mb-3">Ajouter un membre</h2>

			<p>Veuillez remplir le formulaire ci-dessous pour ajouter un membre.</p>

<?php
require 'config.php';
require 'lib/Medoo.php';
require 'lib/Membre.php';
use Medoo\Medoo;
use Membre\Membre;

const PHOTOS_FOLDER_PATH = "./../images/photos/";
const MSG_OK = "Membre ajout&eacute; avec succ&egrave;s.";

// Get POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $msg_error = NULL;
    $valid = FALSE;
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $datenaissance = $_POST['datenaissance'];
    $photo = $_FILES['photo'];
    $photoPath = '';
    $fonction = $_POST['fonction'];

    try {

        // Create new object
        $membre = new Membre($prenom, $nom, $datenaissance, $photoPath, $fonction);

        // Save the uploaded photo to folder and set path
        if (is_uploaded_file($photo['tmp_name'])) {

            $photoTempFile = $photo['tmp_name'];
            $photoPath = PHOTOS_FOLDER_PATH . $photo['name'];
            move_uploaded_file($photoTempFile, $photoPath);
            $membre->setPhotopath($photoPath);

            // TODO : CHECK IF FILE EXISTS

            /*
             * $photoFilename = tempnam(PHOTOSFOLDER, '');
             * unlink($photoFilename);
             * move_uploaded_file($photo['tmp_name'], $photoFilename);
             */
        }        

        // Connect to database
        $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => DB_NAME,
        'server' => DB_SERVER,
        'username' => DB_USERNAME,
        'password' => DB_PASSWORD
        ]);
        
        // Save to database
        $database->insert("membres", [
            "prenom" => $membre->getPrenom(),
            "nom" => $membre->getNom(),
            "datenaissance" => $membre->getDatenaissance(),
            "photo" => $membre->getPhotopath(),
            "fonction" => $membre->getFonction()
        ]);
        
        // TODO : CHECK RESPONSE FROM DATABASE
    
        $valid = TRUE;
        
    } catch (InvalidArgumentException $e) {

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
				<form method="post" action="./ajout-membre.php"
					enctype="multipart/form-data" target="_self" name="formAjoutMembre">
					<!-- Début du formulaire -->

					<div class="form-group">
						<label for="prenom" class="mandatoryinput">Pr&eacute;nom</label> <input
							type="text" class="form-control" id="prenom" name="prenom"
							pattern="^[a-zA-Z]{1,25}$" aria-describedby="prenomaide" required />
						<small id="prenomaide" class="form-text text-muted">25 lettres
							maximum.</small>
					</div>

					<div class="form-group">
						<label for="nom" class="mandatoryinput">Nom</label> <input
							type="text" class="form-control" id="nom" name="nom"
							pattern="^[a-zA-Z]{1,25}$" aria-describedby="nomaide" required />
						<small id="nomaide" class="form-text text-muted">25 lettres
							maximum.</small>
					</div>

					<div class="form-group">
						<label for="datenaissance">Date de naissance</label> <input
							type="date" class="form-control" id="datenaissance"
							name="datenaissance" />
					</div>

					<div class="form-group">
						<label for="photo">Photo</label> <input type="file"
							class="form-control-file" id="photo" name="photo"
							accept="image/*" />
					</div>

					<div class="form-group">
						<label for="fonction">Fonction</label> <select
							class="custom-select" id="fonction" name="fonction">
							<option value="CADRE" selected>Cadre</option>
							<option value="DELEGUE">D&eacute;l&eacute;gu&eacute;</option>
							<option value="MEMBRE">Membre</option>
						</select>
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