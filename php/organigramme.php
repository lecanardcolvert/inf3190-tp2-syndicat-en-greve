<?php
require 'config.php';
require 'lib/Medoo.php';
use Medoo\Medoo;

// Specify document as JSON
header('Content-Type: application/json');

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
    "prenom",
    "fonction",
    "photo"
]);

// Parents
$rootcadres =   array(  'id' => "CADRE",
                        'parent' => "#", 
                        'text' => "Cadres du syndicat");

$rootdelegues = array(  'id' => "DELEGUE", 
                        'parent' => "#", 
                        'text' => "Délégués syndicaux");

$rootmembres =  array(  'id' => "MEMBRE", 
                        'parent' => "#", 
                        'text' => "Simples membres");

$organigramme = array (
    
    $rootcadres,
    $rootdelegues,
    $rootmembres
    
);

// Children
foreach ($datas as $data) {
 
    // Replace no picture with default
    if (empty($data["photo"])) {
        
        $childphoto = "jstree-file";
        
    } else {
        
        $childphoto = $data["photo"];
        
    }
    
    // Create new child
    $child = array(
        'id' => $data["id"],
        'parent' => $data["fonction"],
        'text' => $data["prenom"] .' ' . $data["nom"],
        'icon' => $childphoto
    ); 
    
    // Add it to list
    array_push($organigramme, $child);
    
}

echo json_encode($organigramme);

?>