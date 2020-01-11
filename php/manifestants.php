<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

<meta name="description" content="Liste des manifestants du SPWVM">

<?php include 'head.php'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tablemanifestants').dataTable({

        	"language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
            }
        	
        });
    } );
</script>

<title>SPWVM - Liste des manifestants</title>

</head>
<!-- Début du corps -->
<body id="bodystyle">

<?php include 'header.php'; ?>

<?php include 'navigation.php'; ?>

	<main role="main">
		<div class="container">
			<!-- Début du contenu -->

			<h2 class="mb-3">Liste des manifestants</h2>

			<table id="tablemanifestants"
				class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Pr&eacute;nom</th>
						<th>Lieu</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>

<?php
require 'config.php';
require 'lib/Medoo.php';
use Medoo\Medoo;

// Connect to database
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => DB_NAME,
    'server' => DB_SERVER,
    'username' => DB_USERNAME,
    'password' => DB_PASSWORD
]);

// Select data
$datas = $database->select(TABLE_MANIFESTATION, 

    [
        "[>]" . TABLE_MEMBRE => ["membre" => "id"],
        "[>]" . TABLE_LIEU => ["lieux" => "id"]

    ], [
        TABLE_MEMBRE . '.nom (membre_nom)',
        TABLE_MEMBRE . '.prenom (membre_prenom)',
        TABLE_LIEU . '.nom (lieu_nom)',
        TABLE_MANIFESTATION . '.date (manifestation_date)'
    ]
);

// Display all Manifestation
foreach ($datas as $data) {

    echo '<tr>';
    echo PHP_EOL;
    echo '  <td>' . $data["membre_nom"] . '</td>';
    echo PHP_EOL;
    echo '  <td>' . $data["membre_prenom"] . '</td>';
    echo PHP_EOL;
    echo '  <td>' . $data["lieu_nom"] . '</td>';
    echo PHP_EOL;
    echo '  <td>' . $data["manifestation_date"] . '</td>';
    echo PHP_EOL;
    echo '</tr>';
    echo PHP_EOL;
    
}

?>			
			</tbody>
			</table>

			<!-- Fin du contenu -->
		</div>
	</main>

<?php include 'footer.php'; ?>

</body>
</html>