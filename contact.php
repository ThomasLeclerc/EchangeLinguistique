<?php

require_once 'include/engine.php';

HTML_HEADER('CONTACT');

if(isset($_POST["subjectList"])&&isset($_POST["emailContact"])&&isset($_POST["emailContent"])&&isset($_POST["subjectList"])){
	//on test le champ invisible age pour contrer les robots	
	if(empty($_POST['age'])) {
		$subject = $_POST["subjectList"];
		$resultMails = SQL('select emailUtilisateur from UTILISATEUR where recoitEmail=true');
		if($subject="propositionLangue"){
			$msg = '<h2>Proposition de langue</h2>';
			$msg .= 'Un utilisateur propose d\'ajouter la langue <b>'.$_POST["langueProp"].'</b><br/><br/>';
			$msg .= 'Commentaire : '.$_POST["emailContent"];
			while($mails = $resultMails->fetch_object()){
				sendEmail($_POST["emailContact"], $mails->emailUtilisateur, "Proposition de langue", $msg);
			}
		}else if($subject="retraitInscription"){
			$msg = '<h2>Demande de retrait d\'inscription</h2>';
			$msg .= $_POST["prenom"].' '.$_POST["nom"].' demande la suppression de sa candidature.<br/><br/>';
			$msg .= 'Raisons : '.$_POST["emailContent"];
			while($mails = $resultMails->fetch_object()){
				sendEmail($_POST["emailContact"], $mails->emailUtilisateur, "Retrait de Candidature", $msg);
			}
		}else if($subject="autre"){
			$msg = '<h2>Contact du gestionnaire</h2>';
			$msg .= $_POST["emailContent"];
			while($mails = $resultMails->fetch_object()){
				sendEmail($_POST["emailContact"], $mails->emailUtilisateur, "Message pour le gestionnaire", $msg);
			}
		}
	}else {
		echo '<div class="msg_0">Votre message a bien été envoyé</div>'	;
	}
	
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
				<td><Label for="email">votre email : </label></td><td><input type="email" name="emailContact" id="emailContact" required/> </td>
			</tr><tr>
				<td><Label for="nom">votre nom : </label></td><td><input type="text" name="nom" id="nom" required/> </td>
			</tr><tr>
				<td><Label for="prenom">votre prénom : </label></td><td><input type="text" name="prenom" id="prenom" required/> </td>
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
		<!-- Le champs age est la pour tester les bots de spam. -->
		<!--Le champs age n'est pas visible. -->
		<!--Si il est quand même rempli on n'evoie pas de mail  -->
		<label for="age" class="monAge">votre age: <input type="text" name="age" id="age"></label>	
		<input type="submit" value="Envoyer" class="validate"/>
	</form>

</div>
<br/>

<?php

HTML_FOOTER();
?>