<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Profil');
?>

<form id="profileForm" method="POST" action="profileRequest.php">

</form>




<?php
HTML_FOOTER();
?>