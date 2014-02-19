<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Ajouter une langue');
?>
<script>
$(document).ready(function(){
	//click sur le bouton
	$("#butAddLang").live("click", function ()
	{
		$nom=$("#nom").val();
	
		$.post(	'linkRequest.php',
			{ nom: $nom, id2 : $idFiche2}, 
			function(returnedData){
				console.log(returnedData);
				location.reload();
			}	);
		}
	});
});
</script>
<form id="ajoutLangue">
<label>langue : </label><input type="text" id="nom" name="nom" value="" /><br />
<label>Fichier (JPG, PNG ou GIF | max. 2 Mo) :</label>
<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
<input type="file" id="file" name="file" /><br />
<input type="button" value="Ajouter" id="butAddLang"/>
</form>
<?php
HTML_FOOTER();
?>