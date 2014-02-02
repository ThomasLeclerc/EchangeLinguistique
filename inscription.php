<?php
require_once 'include/engine.php';

HTML_HEADER('INSCRIPTION');
	
?>
<script>
	$("#form_inscription").validate();
</script>
<div id="content">
	
	<div id="FormulaireInscr">
		<h2>Demande pour un tandem linguistique</h2>
		<form action="" method=post id="form_inscription">
		<fieldset>
			<table>
				<tr>
					<td>Dans quelle langue souhaitez-vous vous perfectionner ?</td>
					<td>
						<select name="languePerfectionnement"  required>
							<option> - 
							<option>Français
							<option>Anglais
							<option>Italien
							<option>Espagnole
							<option>Allemand
						</select>
					</td>
				</tr><tr>
					<td>Quelle est votre langue maternelle ou la langue que vous parlez couramment ?</td>
					<td>
						<select name="langueMaternelle" required>
							<option> - 
							<option>Français
							<option>Anglais
							<option>Italien
							<option>Espagnole
							<option>Allemand
						</select>
					</td>
				</tr>
			</table>
			</fieldset>
			<fieldset>
				<legend><h4>Faisons Connaissance</h4></legend>		
			<table>
				<tr>
					<td><label for="prenom">Prénom : </label></td>
					<td><input type="text" name="prenom" id="prenom" required></td>
				</tr><tr>
					<td><label for="nom">Nom : </label></td>
					<td><input type="text" name="nom" id="nom" required/></td>
				</tr><tr>
					<td><label for="age">Votre âge : </label></td>
					<td><input type="text" name="age" id="age" maxlength="3" size=1 required/></td>
				</tr><tr>
					<td>Votre civilité : </td>
					<td>
						<input type="radio" name="civile" id="M" value="M." required><label for="M">M.</label>
						<input type="radio" name="civile" id="Mme" value="Mme" required><label for="Mme">Mme</label>
						<input type="radio" name="civile" id="Mlle" value="Mlle" required><label for="Mlle">Mlle</label>
					</td>
				</tr><tr>
					<td><label for="adresse">Votre adresse : </label></td>
					<td>
						<input type="text" name="adresse" id="adresse" required >
					</td>
				</tr><tr>
					<td><label for="codePostal">Code postale : </label></td>
					<td>
						<input type="text" name="codePostal" id="codePostal" size=1 maxlength=5 required>
					</td>
				</tr><tr>
					<td><label for="ville">Ville : </label></td>
					<td>
						<input type="text" name="ville" id="ville" size=10 required>
					</td>
				</tr><tr>
					<td><label for="tel">Votre numéro de téléphone : </label></td>
					<td><input type="text" name="tel" id="tel" maxlength="10" size=4 required/></td>
				</tr><tr>
					<td><label for="mail">Votre adresse mail (écrire lisiblement) : </label></td>
					<td><input type="text" name="mail" id="mail"  size=30 required/></td>
				</tr>
			</table>
			</fieldset><fieldset>
			<legend><h4>Parlez-nous de vous</h4></legend>
			<table>
				<tr>
					<td><label for="profession">Quelles études poursuivez-vous / quelle est votre profession ? : </label></td>
					<td><input type="text" name="profession" id="profession"  maxsize=250 size=40 required/></td>
				</tr><tr>
					<td  >Comment évaluez-vous votre niveau<br/> dans la langue que vous souhaitez perfectionner : </td>
					<td>
						<input type="radio" name="niveauLanguePerfectionnement" id="debutant" required/><label for="debutant">débutant</label><br/>	
						<input type="radio" name="niveauLanguePerfectionnement" id="inter" required/><label for="inter">intermédiaire</label><br/>
						<input type="radio" name="niveauLanguePerfectionnement" id="avance" required/><label for="avance">avancé</label>
					</td>
				</tr><tr>
					<td  >Si vous le connaissez indiquez votre niveau de langue dans le système européen : <br/>
					<a href="Ressources/Descripteur.pdf" target="_blank">(description des niveaux de langue du Système européen)</a>
					</td>
					<td>
						<input type="radio" name="niveauLangueSysteme" id="a1" required/><label for="a1">A1</label>
						<input type="radio" name="niveauLangueSysteme" id="b1" required/><label for="b1">B1</label>
						<input type="radio" name="niveauLangueSysteme" id="c1" required/><label for="c1">C1</label>
						<br/>	
						<input type="radio" name="niveauLangueSysteme" id="a2" required/><label for="a2">A2</label>
						<input type="radio" name="niveauLangueSysteme" id="b2" required/><label for="b2">B2</label>
						<input type="radio" name="niveauLangueSysteme" id="c2" required/><label for="c2">C2</label><br/>
						<input type="radio" name="niveauLangueSysteme" id="no" checked required/><label for="no">je ne sais pas</label>
					</td>
				</tr>	
			</table>
			</fieldset><fieldset>
			<legend><h4>Plus d'informations ...</h4></legend>
			<table>
				<tr>
					<td>
						Quels sont vos loisirs, vos centres d'intérêt,<br/> pourquoi voules-vous perfectionner une langue étrangère ?
				</tr><tr>	</td><td>
						<textarea cols=50 rows=5></textarea>
					</td>
				</tr>
			</table>
			</fieldset>
			<input type="submit" value="Valider l'inscription" class="validate"/>
		</form>
	</div>
</div>

<?php
HTML_FOOTER();
?>
