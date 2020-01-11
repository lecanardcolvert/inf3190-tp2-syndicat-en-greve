<?php

// Connection à la BD
define('DB_NAME', 'inf3190tp2');
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

define ('TABLE_LIEU', 'lieux');
define ('TABLE_MANIFESTATION', 'manifestations');
define ('TABLE_MEMBRE', 'membres');

/* NOTE : J'ai pu créer un compte utilisateur différent de 'root'
 * dans mon environnement, cependant il m'était impossible de lui
 * assigner des privilèges. J'ai donc utilisé le compte 'root'
 * pour éviter de perdre du temps.
 */

?>
