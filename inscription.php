<?php
require_once 'include/engine.php';

HTML_HEADER('INSCRIPTION');
	
?>
<div id="content">
	<div id="form_inscription">
		<h2>Demande pour un tandem linguistique</h2>
		<form action="" method=post>
		
			<table>
				<tr>
					<td>Dans quelle langue souhaitez-vous vous perfectionner ?</td>
					<td>
						<select name="languePerfectionnement">
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
						<select name="languePerfectionnement">
							<option>Français
							<option>Anglais
							<option>Italien
							<option>Espagnole
							<option>Allemand
						</select>
					</td>
				</tr>
			</table>
			
					
			<table>
				<tr"><td colspan=2><h4>Faisons Connaissance</h4></td></tr>
				<tr>
					<td><label for="prenom">Prénom : </label></td>
					<td><input type="text" name="prenom" id="prenom"/></td>
				</tr><tr>
					<td><label for="nom">Nom : </label></td>
					<td><input type="text" name="nom" id="nom"/></td>
				</tr><tr>
					<td><label for="age">Votre âge : </label></td>
					<td><input type="text" name="age" id="age" maxlength="3" size=1/></td>
				</tr><tr>
					<td><label>Votre adresse : </label></td>
					<td>
						<textarea name="adresse" id="adresse" ></textarea>
					</td>
				</tr><tr>
					<td><label for="tel">Votre numéro de téléphone : </label></td>
					<td><input type="text" name="tel" id="tel" maxlength="10" size=4/></td>
				</tr><tr>
					<td><label for="mail">Votre adresse mail (écrire lisiblement) : </label></td>
					<td><input type="text" name="mail" id="mail"  size=30/></td>
				</tr>
			</table>
			<table>
				<tr">
					<td colspan=2><h4>Parlez-nous de vous</h4></td>
				</tr><tr>
					<td><label for="profession">Quelles études poursuivez-vous / quelle est votre profession ? : </label></td>
					<td><input type="text" name="profession" id="profession"  maxsize=250 size=40/></td>
				</tr><tr>
					<td  >Comment évaluez-vous votre niveau dans la langue que vous souhaitez perfectionner : </td>
					<td>
						<input type="radio" name="niveauLanguePerfectionnement" id="debutant"/><label for="debutant">débutant</label><br/>	
						<input type="radio" name="niveauLanguePerfectionnement" id="inter"/><label for="inter">intermédiaire</label><br/>
						<input type="radio" name="niveauLanguePerfectionnement" id="avance"/><label for="avance">avancé</label>
					</td>
				</tr><tr>
					<td  >Comment évaluez-vous votre niveau dans la langue que vous souhaitez perfectionner : <br/>
					<a href="">(description des niveaux de langue du Système européen)</a>
					</td>
					<td>
						<input type="radio" name="niveauLanguePerfectionnement" id="a1"/><label for="a1">A1</label><br/>	
						<input type="radio" name="niveauLanguePerfectionnement" id="a2"/><label for="a2">A2</label><br/>
						<input type="radio" name="niveauLanguePerfectionnement" id="b1"/><label for="b1">B1</label><br/>
						<input type="radio" name="niveauLanguePerfectionnement" id="b2"/><label for="b2">B2</label><br/>
						<input type="radio" name="niveauLanguePerfectionnement" id="c1"/><label for="c1">C1</label><br/>
						<input type="radio" name="niveauLanguePerfectionnement" id="c2"/><label for="c2">C2</label><br/>
					</td>
				</tr>
				
				
			</table>
		
		
		
		
		
		</form>
	</div>
</div>

<?php
HTML_FOOTER();
?>
