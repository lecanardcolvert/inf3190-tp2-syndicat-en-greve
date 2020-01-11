<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

<meta name="description"
	content="Contacter le SPWVM">

<?php include 'head.php'; ?>

<title>SPWVM - Contacts</title>

</head>

<!-- Début du corps -->
<body id="bodystyle">

<?php include 'header.php'; ?>

<?php include 'navigation.php'; ?>

	<main role="main">
		<div class="container">
		<!-- Début du contenu -->
	
			<h2 class="mb-3">Contacts</h2>
	
			<!-- Début de l'organigramme -->
	
			<h4 class="mb-4 mb-3">Organigramme</h4>
			
			<script>
    			$(document).ready(function(){
        			$("#showhide").click(function(){
        				$("#organigramme").toggle();
        			});

        			$("#organigramme").toggle();
        			
    			});	
			</script>
			
			<p>
				<a href="#" id="showhide">Afficher ou cacher l'organigramme</a>
			</p>
			
			<div id="organigramme"></div>
	
			    <script>
				$('#organigramme').jstree({
                	'core' : {
                		'data' : {
                			'url' : './organigramme.php',
                			'data' : function (node) {
                				return { 'id' : node.id };
            			}
            		}
            	}});
                </script>
	
			<!-- Fin de l'organigramme -->
	
			<h4 class="mt-4 mb-3">Notre adresse</h4>
			<address>
				<strong>
					Syndicat des programmeurs de la Ville de Montr&eacute;al
				</strong><br />
				1337, rue du Javascript<br />
				Montr&eacute;al (Qu&eacute;bec)&nbsp;&nbsp;H4H 4H4<br />
				T&eacute;l&eacute;phone : (514) 777-1234
			</address>
			
			<h4 class="mt-4 mb-3">Par t&eacute;l&eacute;phone</h4>
			<p>
				Veuillez nous joindre au (514) 777-1234, du lundi au vendredi, de 8h30 &agrave; 16h30.
			</p>
			
			<h4 class="mt-4 mb-3">Notre site web</h4>
			<p>
				Bonne nouvelle, vous y &ecirc;tes d&eacute;j&agrave;. L'adresse de notre site 
				web est 
				<a href="./index.html">https://www.spwvm.ca/</a>. Parlez de nous &agrave; vos coll&egrave;gues !
			</p>
		
		<!-- Fin du contenu -->
		</div>
	</main>

<?php include 'footer.php'; ?>

</body>
</html>