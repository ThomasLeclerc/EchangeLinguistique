<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Ajouter une langue');
?>
<form id="ajoutLangue" action="langueRequest.php" method="POST"  enctype="multipart/form-data">
<label>langue : </label><input type="text" id="nom" name="nom" value="" /><br />
<label>Fichier (JPG, PNG ou GIF | max. 2 Mo) :</label>
<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
<input type="file" id="flag" name="flag" /><br />
<input type="submit" value="Ajouter" id="butAddLang"/>
</form>
<?php
HTML_FOOTER();
?>