<?php
require_once 'include/engine.php';

HTML_HEADER('INSCRIPTION');

if(isset($_POST["valide"])){
	if(!isset($_POST["complement"])){
		$complement = null;
	}else{
		$complement = $_POST["complement"];
	}
	$result = SQL('INSERT INTO FICHE values(
						null, 
						"'.$_POST["nom"].'",	
						"'.$_POST["prenom"].'",	
						'.$_POST["langueMaternelle"].', 
						'.$_POST["languePerfectionnement"].', 
						'.$_POST["age"].', 
						"'.$_POST["sexe"].'", 
						"'.$_POST["adresse"].'", 
						"'.$_POST["codePostal"].'", 
						"'.strtoupper($_POST["ville"]).'", 		
						"'.$_POST["tel"].'", 
						"'.$_POST["mail"].'", 
						"'.$_POST["profession"].'", 
						"'.$_POST["niveauLanguePerfectionnement"].'", 
						"'.$_POST["niveauLangueSysteme"].'", 
						"'.$complement.'")');
				
	if($result==true){
		echo "<div class='msg_0'>Votre inscription au tandem linguistique a bien été prise en compte. Vous serez informés par email lorsqu'un partenariat sera disponible.</div>";
	}else{
		echo "<div class='msg_1'>Un problème est survenu lors de votre inscritpion. veuillez réessayer.</div>";
	}
}else{
	$result=SQL("SELECT * FROM LANGUE");
	$htmlSelectLangue = '';
	while($resultat=$result->fetch_object()){
		$htmlSelectLangue .= "<option value='".$resultat->idLangue."'>".$resultat->libelleLangue;
	}




?>
<script>	

$(document).ready(function(){
	var idPerf = 1	;
	var idMat = 1;
	
	$("#form_inscription").validate();	
	
	$("#ajouterLanguePerf").live("click", function () {
		var prevHtml = $("#TdLanguePerfectionnement").html();
		prevHtml += "<select name='languePerfectionnement"+idPerf+"' required><?=$htmlSelectLangue?></select><br/>";
		idPerf++;
		$("#TdLanguePerfectionnement").html(prevHtml);
	});
	
		$("#ajouterLangueMat").live("click", function () {
		var prevHtml = $("#TdLangueMaternelle").html();
		prevHtml += "<select name='langueMaternelle"+idMat+"' required><?=$htmlSelectLangue?></select><br/>";
		idMat++;
		$("#TdLangueMaternelle").html(prevHtml);
	});
	
});
</script>


<div id="FormulaireInscr">
	<h2>Demande pour un tandem linguistique</h2>
	<form action="" method=post id="form_inscription">
	<small>* champs obligatoires</small>
	<fieldset>
	<legend>Langues</legend>
		<table>
			<tr>
				<td>Quelle est votre langue maternelle ou <br/>la langue que vous parlez couramment ?</td>
				<td id="TdLangueMaternelle">
					<select name="langueMaternelle" required>
						<?=$htmlSelectLangue?>
					</select>
					<input type="button" id="ajouterLangueMat" value="ajouter une langue"/><br/>
				</td>
			</tr>
			<tr><td colspan="2"><hr></td></tr>
			<tr>
				<td>La langue que vous souhaitez perfectionner ? </td>
				<td id="TdLanguePerfectionnement">
					<select name="languePerfectionnement" required>
						<?=$htmlSelectLangue?>
					</select>
					<input type="button" id="ajouterLanguePerf" value="ajouter une langue"/><br/>
					
				</td>
			</tr><tr>
				<td  >Votre niveau dans cette langue : </td>
				<td>
					<input type="radio" name="niveauLanguePerfectionnement" id="debutant" value="faible"required/><label for="debutant">débutant</label>
					<input type="radio" name="niveauLanguePerfectionnement" id="inter" value="intermédiaire" required/><label for="inter">intermédiaire</label>
					<input type="radio" name="niveauLanguePerfectionnement" id="avance" value="avancé" required/><label for="avance">avancé</label>
				</td>
			</tr>	<tr>
				<td  >Si vous le connaissez,<br/> votre niveau dans le système européen : <br/>
				<a href="Ressources/Descripteur.pdf" target="_blank">(Système européen)</a>
				</td>
				<td>
					<input type="radio" name="niveauLangueSysteme" id="a1" value="A1" /><label for="a1">A1</label>
					<input type="radio" name="niveauLangueSysteme" id="b1" value="B1" /><label for="b1">B1</label>
					<input type="radio" name="niveauLangueSysteme" id="c1" value="C1" /><label for="c1">C1</label>
					  * <br/>	
					<input type="radio" name="niveauLangueSysteme" id="a2" value="A2" /><label for="a2">A2</label>
					<input type="radio" name="niveauLangueSysteme" id="b2" value="B2" /><label for="b2">B2</label>
					<input type="radio" name="niveauLangueSysteme" id="c2" value="C3" /><label for="c2">C2</label><br/>
					<input type="radio" name="niveauLangueSysteme" id="no" value="" checked /><label for="no">je ne sais pas</label>
				</td>
			</tr>
			

		</table>
		</fieldset>
		<fieldset>
			<legend><h4>Faisons Connaissance</h4></legend>		
		<table>
			<tr>
				<td><label for="prenom">Prénom : </label></td>
				<td><input type="text" name="prenom" id="prenom" required>*</td>
			</tr><tr>
				<td><label for="nom">Nom : </label></td>
				<td><input type="text" name="nom" id="nom" required/>*</td>
			</tr><tr>
				<td><label for="age">Votre âge : </label></td>
				<td><input type="text" name="age" id="age" maxlength="3" size=1 required/>*</td>
			</tr><tr>
				<td>Votre civilité : </td>
				<td>
					<input type="radio" name="sexe" id="M" value="M." required><label for="M">Homme</label>
					<input type="radio" name="sexe" id="F" value="Mme" required><label for="Mme">Femme</label> *
				</td>
			</tr><tr>
				<td><label for="adresse">Votre adresse : </label></td>
				<td>
					<input type="text" name="adresse" id="adresse" required >*
				</td>
			</tr><tr>
				<td><label for="codePostal">Code postale : </label></td>
				<td>
					<input type="text" name="codePostal" id="codePostal" size=1 maxlength=5 required>*
				</td>
			</tr><tr>
				<td><label for="ville">Ville : </label></td>
				<td>
					<input type="text" name="ville" id="ville" size=10 required>*
				</td>
			</tr><tr>
				<td><label for="tel">Votre numéro de téléphone : </label></td>
				<td><input type="text" name="tel" id="tel" maxlength="10" size=4 required/>*</td>
			</tr><tr>
				<td><label for="mail">Votre adresse mail (écrire lisiblement) : </label></td>
				<td><input type="text" name="mail" id="mail"  size=30 required/>*</td>
			</tr>
		</table>
		</fieldset><fieldset>
		<legend><h4>Parlez-nous de vous</h4></legend>
		<table>
			<tr>
				<td><label for="profession">Quelles études poursuivez-vous / <br/>quelle est votre profession ? : </label></td>
				<td><input type="text" name="profession" id="profession"  maxsize=250 size=30 required/> * </td>
			</tr>
		</table>
		<br/><br/>
		<table>
			<tr>
				<td>
					Quels sont vos loisirs, vos centres d'intérêt,<br/> pourquoi voules-vous perfectionner une langue étrangère ?
			</tr><tr>	</td><td>
					<textarea name="complement" cols=50 rows=5></textarea>
				</td>
			</tr>
		</table>
		</fieldset>
		<input type="submit" value="Valider l'inscription" class="validate"/>
		<input type="hidden" name="valide" value="ok"/>
	</form>
</div>


<?php
}
HTML_FOOTER();
?>
