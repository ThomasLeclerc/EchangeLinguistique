<?php 
define('RACINE',$_SERVER["DOCUMENT_ROOT"].'/EchangeLinguistique/');
define('SHORT_RACINE','/EchangeLinguistique/');
define('INCLUDE_DIR',RACINE.'include/');
define('DEVELOPPEMENT',true);
define('SQL_AFFICHER_REQUETES',true); // Si DEVELOPPEMENT == true

define('SQL_HOSTNAME',"localhost"); //A DEFINIR
define('SQL_USER','echange');		// A DEFINIR
define('SQL_PASSWORD',"echange");  // A DEFINIR
define('SQL_DATABASE',"base_echanges"); // A DEFINIR
define('SQL_SET_NAME_UTF8',true); // S'il y a un probl�me d'encodage vis-�-vis de la configuration du serveur
?>
