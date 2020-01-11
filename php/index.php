<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

<meta name="description"
	content="Site web du syndicat des programmeurs web de la Ville de Montr�al">

<?php include 'head.php'; ?>

<title>Syndicat des programmeurs web de la Ville de
	Montr&eacute;al</title>

</head>

<!-- Début du corps -->
<body id="bodystyle">

<?php include 'header.php'; ?>

<?php include 'navigation.php'; ?>

	<main role="main">
		<div class="container">	
		<!-- Début du contenu -->
			 
			 <h2 class="mb-3">Titre principal</h2>
			 <p class="lead" id="headline">
				 <img src="./../images/employe_fatigue.jpg" alt="Un employ&eacute; 
				 &eacute;puis&eacute; au travail" class="rounded img-fluid" id="tiredemployee" />
				 Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
				 Mauris auctor augue at urna facilisis, sit amet facilisis elit mattis. 
				 Aliquam porttitor semper dapibus. Nunc eget urna risus. Vivamus rhoncus 
				 nunc vitae lacus ultrices, non lobortis lacus posuere. Ut consequat 
				 venenatis arcu vel cursus. Nunc nec varius nisi. Mauris eleifend sit 
				 amet felis sit amet dictum. Morbi lacinia tempor nisl, quis luctus 
				 ante malesuada vel. Morbi eget sollicitudin eros. Curabitur vel 
				 augue vitae ante pharetra faucibus at eu turpis. Proin et rutrum 
				 nunc, vel maximus urna.
			</p>
			
			<!-- Début de l'animation  -->
			<div class="row justify-content-center">
			
				<div class="col-md-auto" id="animation">
				
					<img src="./../images/sadsmiley.png" id="imageanimation1" alt="" />
					<img src="./../images/money.png" id="imageanimation2" alt="" />
					<img src="./../images/happysmiley.png" id="imageanimation3"
					 alt="Un employ&eacute; heureux est un employ&eacute; bien pay&eacute; !" />

					<script>
					$(document).ready(function() {
        				$("#imageanimation1").delay(1000).fadeOut(1000, function() {
            				// Money
        					$("#imageanimation2").fadeIn(1000, function() {
        						$("#imageanimation2").fadeOut(1000, function() {
        							// Happy smiley
            						$("#imageanimation3").fadeIn(1000);
        						});
        					});
        				});
					});
					</script>	
					
				</div>
			</div>
			<!-- Fin de l'animation  -->
	
			<h2 class="mt-4 mb-3">&Eacute;volution de la gr&egrave;ve</h2>
				<p class="text-md-left">Ut viverra vestibulum dolor, sodales laoreet lacus 
				sodales sit amet. Maecenas laoreet varius eros ut tempor. In tristique enim 
				sit amet diam dapibus, nec pharetra massa elementum. Donec id condimentum 
				augue, in interdum libero. Suspendisse nec iaculis tortor. Ut ac congue 
				mauris. Aliquam erat volutpat. Vestibulum dictum porttitor purus vitae 
				varius. Quisque aliquam leo vulputate dui lobortis, nec posuere ex 
				convallis. Praesent porta felis massa, eu accumsan urna ornare sit amet. 
				In sollicitudin laoreet diam, ac condimentum urna placerat at. Nam semper 
				orci quis sem feugiat, in ultrices nunc maximus.
			</p>
	
			<h2 class="mt-3 mb-3">Manifestations</h2>
			
			<p class="text-md-left">
			<a href="./manifestants.php" target="_self">Liste des manifestants</a>
			</p>
			
			<p class="text-md-left">Cliquez sur un point de la carte pour
				afficher les d&eacute;tails des manifestations en cours.</p>
	
			<div class="row">
				<div class="col-2">
					<!-- Vide -->
				</div>
				<div class="col-8">
					<img src="./../images/cartemontreal.png"
						class="rounded img-fluid mx-auto d-block" id="cartemanifestations"
						alt="Carte des manifestations &agrave; venir"
						usemap="#mapmanifestations" />
	
					<map name="mapmanifestations">
						<area alt="Universit&eacute; de Montr&eacute;al"
							href="./manifestation-udem.php" target="_self" 
							coords="505,382,529,420" shape="rect">
						<area
							alt="Universit&eacute; du Qu&eacute;bec &agrave; Montr&eacute;al"
							href="./manifestation-uqam.php" target="_self" 
							coords="583,367,607,407" shape="rect">
						<area alt="Verdun" href="./manifestation-verdun.php" target="_self" 
						coords="569,471,592,509" shape="rect">
					</map>
				</div>
				<div class="col-2">
					<!-- Vide -->
				</div>
			</div>
			
		<!-- Fin du contenu -->	
		</div>
	</main>

<?php include 'footer.php'; ?>

</body>
</html>