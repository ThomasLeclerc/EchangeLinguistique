<?php
// Moteur + v�rif des droits
require_once '../include/engine.php';
// Si non connect�
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Administration');
?>
<!--liste des menus admin-->
<div>
</div>
<?php 
HTML_FOOTER();
?>
