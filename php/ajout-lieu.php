<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

<meta name="description"
	content="Ajouter un lieu de manifestation du SPWVM">

<?php include 'head.php'; ?>

<title>SPWVM - Ajouter un lieu de manifestation</title>

</head>

<!-- Début du corps -->
<body id="bodystyle">

<?php include 'header.php'; ?>

<?php include 'navigation.php'; ?>

	<main role="main">
	<div class="container">
		<!-- Début du contenu -->

		<h2 class="mb-3">Ajouter un lieu de manifestation</h2>

		<p>Veuillez remplir le formulaire ci-dessous pour ajouter un lieu de
			manifestation.</p>

<?php
require 'config.php';
require 'lib/Medoo.php';
require 'lib/Lieu.php';
use Medoo\Medoo;
use Lieu\Lieu;

const MSG_OK = "Lieu ajout&eacute; avec succ&egrave;s.";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $msg_error = NULL;
    $valid = FALSE;
    $nom = $_POST['nom'];
    $commentaire = $_POST['commentaire'];

    try {
        
        // Create new object
        $lieu = new Lieu($nom, $commentaire);
        
        // Connect to database
        $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => DB_NAME,
        'server' => DB_SERVER,
        'username' => DB_USERNAME,
        'password' => DB_PASSWORD
        ]);
        
        // Save to database
        $database->insert("lieux", [
            "nom" => $lieu->getNom(),
            "commentaire" => $lieu->getCommentaire()
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
			<form method="post" action="./ajout-lieu.php" target="_self"
				name="formAjoutLieu">
				<!-- Début du formulaire -->

				<div class="form-group">
					<label for="nom" class="mandatoryinput">Nom du lieu</label> <input
						type="text" class="form-control" id="nom" name="nom"
						pattern="^[a-zA-Z]{1,64}$" aria-describedby="nomaide" required /> <small
						id="nomaide" class="form-text text-muted">Le nom du lieu doit
						&ecirc;tre compos&eacute; de 1 &agrave; 64 lettres.</small>
				</div>

				<div class="form-group">
					<label for="commentaire">Commentaire</label> <input type="text"
						class="form-control" id="commentaire" name="commentaire" />
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