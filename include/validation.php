<?php
	require_once 'engine.php';
	HTML_HEADER('Inscription Terminée');
	$languesMat = $_POST["langueMaternelle"];
?>
	<div id="FormulaireValidation">
		<h2>Validation des informations saisies</h2>
		<form action="doInscription.php" method=post id="form_validaion">
		<fieldset>
		<legend>Langues</legend>
			<table>
				<tr>
					<td>Langues parlées couramment : </td>
					<td id="TdLangueMaternelle">
						<?
							
						?>
						<select name="langueMaternelle[]" required>
							<option value='1'>Francais<option value='2'>Anglais<option value='3'>Allemand<option value='4'>Espagnol<option value='5'>Russe<option value='6'>Chinois<option value='7'>Breton<option value='8'>Italien					</select>
						
						<input type="button" id="ajouterLangueMat" title="Autre langue" value="+"/><br/>
					</td>
				</tr>
				<tr><td colspan="2"><hr></td></tr>
				<tr>
					<td>La langue que vous souhaitez perfectionner ? </td>
					<td id="TdLanguePerfectionnement">
						<div class="listLanguePerf">
							<select name='languePerfectionnement[]' required><option value='1'>Francais<option value='2'>Anglais<option value='3'>Allemand<option value='4'>Espagnol<option value='5'>Russe<option value='6'>Chinois<option value='7'>Breton<option value='8'>Italien</select>
							<select name='niveauLanguePerfectionnement[]' id='niveauLanguePerfectionnement'>
								<option value='débutant'>débutant
								<option value='intermédiaire'>intermédiaire
								<option value='avancé'>avancé
							</select>
							<select name='niveauLangueSysteme[]' id='niveauLangueSysteme'>
								<p>niveau dans le système européen</p>
								<option value='no'>je ne sais pas
								<option value='A1'>A1
								<option value='A2'>A2
								<option value='B1'>B1
								<option value='B2'>B2
								<option value='C1'>C1
								<option value='C2'>C2
							</select><input type="button" id="ajouterLanguePerf" title="Autre langue" alt="Autre langue" value="+"/><br/>
						</div>
						
					</td>
				</tr><tr>
					<td colspan="2">
					<a href="Ressources/Descripteur.pdf" target="_blank">(Système européen)</a>
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
					<td><input type="text" name="adresse" id="adresse" required >*</td>
				</tr><tr>
					<td><label for="codePostal">Code postale : </label></td>
					<td><input type="text" name="codePostal" id="codePostal" size=1 maxlength=5 required>*</td>
				</tr><tr>
					<td><label for="ville">Ville : </label></td>
					<td><input type="text" name="ville" id="ville" size=10 required>*</td>
				</tr><tr>
					<td><label for="tel">Votre numéro de téléphone : </label></td>
					<td><input type="text" name="tel" id="tel" maxlength="10" size=4 required/>*</td>
				</tr><tr>
					<td><label for="mail">Votre adresse mail : </label></td>
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
		</form>
	</div>	
	
	
	
<?
	HTML_FOOTER();	
?>