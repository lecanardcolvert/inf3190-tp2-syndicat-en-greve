<?php

// If POST, redirect to admin page
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'administration.php';
    header("Location: http://$host$uri/$extra");
    exit();
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

<meta name="description"
	content="Connexion au site s&eacute;curis&eacute; du SPWVM">

<?php include 'head.php'; ?>

<title>SPWVM - Connexion</title>

</head>
<!-- D�but du contenu -->
<body id="bodystyle">

<?php include 'header.php'; ?>

<?php include 'navigation.php'; ?>

	<main role="main">
		<div class="container">
			<!-- D�but du contenu -->

			<h2 class="mb-3">Connexion</h2>

			<p>Veuillez vous connecter pour acc&eacute;der au contenu
				s&eacute;curis&eacute;.</p>

			<div class="col-md-6 mt-4 pt-3 pb-3 border bg-light">
				<form method="post" action="./connexion.php" target="_self"
					name="formConnexion">
					<!-- D�but du formulaire -->

					<div class="form-group">
						<label for="username" class="mandatoryinput">Nom d'utilisateur</label>
						<input type="text" class="form-control" id="username"
							name="username" pattern="[a-z]{5,8}\d{2}"
							aria-describedby="usernameHelpBlock" required /> <small
							id="usernameHelpBlock" class="form-text text-muted">Le nom
							d'utilisateur est compos&eacute; de 5 &agrave; 8 lettres minuscules et 2
							chiffres.</small>
					</div>

					<div class="form-group">
						<label for="password" class="mandatoryinput">Mot de passe</label>
						<input type="password" class="form-control" id="password"
							name="password" pattern="[a-zA-Z\d]{8,12}"
							aria-describedby="passwordHelpBlock" required /> <small
							id="passwordHelpBlock" class="form-text text-muted">Le mot de
							passe est compos&eacute; de 8 &agrave; 12 caract&egrave;res
							alphanum&eacute;riques.</small>
					</div>

					<button type="submit" class="btn btn-primary">Soumettre</button>

					<!-- Fin du formulaire -->
				</form>
			</div>

			<!-- Fin du contenu -->
		</div>
	</main>

<?php include 'footer.php'; ?>

</body>
</html>