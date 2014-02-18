<?php

require_once 'include/engine.php';

HTML_HEADER('CONTACT');

if(isset($_POST["subjectList"])&&isset($_POST["emailContact"])&&isset($_POST["emailContent"])&&isset($_POST["subjectList"])){
	$subject = $_POST["subjectList"];
	
	if($subject="propositionLangue"){
		$msg = '<h2>Proposition de langue</h2>';
		$msg .= 'Un utilisateur propose d\'ajouter la langue '.$_POST["langueProp"].'<br/>';
		$msg .= $_POST["emailContent"];
	}	
	sendEmail($_POST["emailContact"], "leclercthomas@yahoo.fr", "Proposition de langue", $msg);
	
}
?>
<script>
$(document).ready(function(){
	$( "#subjectList" ).change(function () {
		var html = '';		
		
		if($('#subjectList option:selected').val()=="propositionLangue"){
			html = '<tr><td><Label for="langueProp">Langue à proposer : </label></td><td><input type="text" name="langueProp" id="langueProp"/></td></tr>	';		
			html += ' <tr><td><Label for="emailContent">Commentaire : </label></td><td></td></tr><tr><td colspan=2><textarea name="emailContent" id="emailContent" style="width:100%;height:130px;"></textarea></td></tr>';
		}else if($('#subjectList option:selected').val()=="retraitInscription"){
			html = '<tr><td><Label for="nom">Votre nom : </label></td><td><input type="text" name="nom" id="nom"/></td></tr>';
			html += 	' <tr><td><Label for="prenom">Votre prenom : </label></td><td><input type="text" name="prenom" id="prenom"/></td></tr>';		
			html += ' <tr><td><Label for="emailContent">Pourquoi nous quittez vous ? : </label></td><td></td></tr><tr><td colspan=2><textarea name="emailContent" id="emailContent" style="width:100%;height:130px;"></textarea></td></tr>';
		}else if($('#subjectList option:selected').val()=="autre"){
			html = '<tr><td><Label for="sujetAutre">Sujet : </label></td><td><input type="text" name="sujetAutre" id="sujetAutre"/></td></tr>';
			html += ' <tr><td><Label for="emailContent">Message : </label></td><td></td></tr><tr><td colspan=2><textarea name="emailContent" id="emailContent" style="width:100%;height:130px;"></textarea></td></tr>';			
		}
		$('#tableContact2').html(html);
	
	})
});
</script>

<div id="divFormContact">
	<h3>Des question ou des remarques ? Contactez nous.</h3>
	<form id="formContact" action="" method="POST">
		<table id="tableContact">
			<tr>
				<td><Label for="email">votre email : </label></td><td><input type="email" name="emailContact" required/> </td>
			</tr><tr>
				<td><Label for="subjectList">Sujet : </label></td>
				<td>
					<select name="subjectList" id="subjectList" required>
						<option value="">
						<option value="propositionLangue">Proposition de langue
						<option value="retraitInscription">Retrait de candidature
						<option value="autre">Autre
					</select>			
				</td>		
			</tr>
		</table>	<br/><br/>
		<table id="tableContact2">
		
		</table>
			
		<input type="submit" value="Envoyer" class="validate"/>
	</form>

</div>
<br/>

<?php

HTML_FOOTER();
?>