<?php

// TODO : Protect page

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

<meta name="description" content="Administration du site du SPWVM">

<?php include 'head.php'; ?>

<title>SPWVM - Administration du site</title>

</head>
<!-- Début du corps -->
<body id="bodystyle">

<?php include 'header.php'; ?>

<?php include 'navigation.php'; ?>

	<main role="main">
		<div class="container">
			<!-- Début du contenu -->

			<h2 class="mb-3">Administration du site</h2>

			<p>Vous &ecirc;tes maintenant connect&eacute; dans la section
				s&eacute;curis&eacute;e.</p>

			<ul>
				<li><a href="./ajout-membre.php" target="_self">Ajouter un membre</a></li>
				<li><a href="./ajout-lieu.php" target="_self">Ajouter un lieu</a></li>
				<li><a href="./ajout-manifestation.php" target="_self">Ajouter une
						manifestation</a></li>
			</ul>

			<!-- Fin du contenu -->
		</div>
	</main>

<?php include 'footer.php'; ?>

</body>
</html>