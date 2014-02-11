<?php
	require_once 'engine.php';
	HTML_HEADER('Inscription Terminée');
	$ccSize = 12;
	$languesMat = $_POST["langueMaternelle"];
	$languesPerf = $_POST["languePerfectionnement"];
	$niveauxLanguesPerf = $_POST["niveauLanguePerfectionnement"];
	$niveauxSysteme = $_POST["niveauLangueSysteme"];
	
	
?>
	<div id="FormulaireValidation">
		<h2>Validation des informations saisies</h2>
		<form action="doInscription.php" method=post id="form_validaion">
			<fieldset>
				<legend><h4>Informations générales</h4></legend>	
	
					<input readonly type="text" name="prenom" style="width:<?=strlen($_POST['prenom'])*$ccSize?>px" value="<?=$_POST['prenom']?>">
					<input readonly type="text" name="nom" style="width:<?=strlen($_POST['nom'])*10?>px" value="<?=$_POST['nom']?>"/>
					<br/>	
					<input readonly type="text" name="profession" style="width:<?=strlen($_POST['profession'])*$ccSize?>px"  value="<?=$_POST['profession']?>"/>
					<br/>
					<input readonly type="text" name="age" style="width:<?=strlen($_POST['age'])*$ccSize?>px" value="<?=$_POST['age']?>"/> ans
					<br/>
					
					<?php
						if($_POST['sexe']=="M"){
							echo 'Homme';						
						}else{
							echo 'Femme';
						}
					?>
					<br/>
					<input type="hidden" name="sexe" value="<?=$_POST["sexe"]?>"/>

					
					<input readonly type="text" name="adresse" style="width:<?=strlen($_POST['adresse'])*$ccSize?>px"   value="<?=$_POST['adresse']?>">
					<br/>
					<input readonly type="text" name="codePostal" style="width:<?=strlen($_POST['codePostal'])*$ccSize?>px"  value="<?=$_POST['codePostal']?>"/>					
					<input readonly type="text" name="ville" style="width:<?=strlen($_POST['ville'])*$ccSize?>px"  value="<?=$_POST['ville']?>"/>
					<br>
					Téléphone : <input readonly type="text" name="tel" style="width:<?=strlen($_POST['tel'])*$ccSize?>px"  value="<?=$_POST['tel']?>"/>
					<br/>Email : <input readonly type="text" name="mail" style="width:<?=strlen($_POST['mail'])*($ccSize-2)?>px"  value="<?=$_POST['mail']?>"/>
					<br/>
					<p>Complément : </p>
					<textarea readonly name="complement" cols=50 rows=5><?=$_POST["complement"]?></textarea>
			</fieldset>
			
			
			
			<fieldset>
				<legend>Langues</legend>
				<table>
				<tr><td>Langue(s) parlée(s) : </td><td>
				<?php
					foreach($languesMat as $idLangue){
						$result = SQL('SELECT libelleLangue FROM LANGUE WHERE idLangue='.$idLangue);
						$langue = $result->fetch_object();
						echo '<input readonly type="text" style="width:'.strlen($langue->libelleLangue)*$ccSize.'px"  value="'.$langue->libelleLangue.'"/>'	;
						echo '<input type="hidden" name="langueMaternelle[]"  value="'.$idLangue.'"/> ';				
					}
					echo '<br/>';
				?>
				</td></tr>
				<tr><td>Langue(s) recherchée(s):</td><td>
				<?php
					foreach($languesPerf as $idLangue){
						$key = array_search($idLangue, $languesPerf);
						$result = SQL('SELECT libelleLangue FROM LANGUE WHERE idLangue='.$idLangue);
						$langue = $result->fetch_object();
						echo '<input readonly type="text" style="width:'.strlen($langue->libelleLangue)*$ccSize.'px"  value="'.$langue->libelleLangue.'"/>'	;
						echo '<input type="hidden" name="languePerfectionnement[]"  value="'.$idLangue.'"/> ';	
						echo '<input readonly type="text" name="niveauLanguePerfectionnement[]" style="width:'.strlen($niveauxLanguesPerf[$key])*$ccSize.'px"  value="'.$niveauxLanguesPerf[$key].'"/>';	
						echo '<input readonly type="text" name="niveauLangueSysteme[]" style="width:'.strlen($niveauxSysteme[$key])*$ccSize.'px"  value="'.$niveauxSysteme[$key].'"/>'	;				
					}				
				
				
				?>
				</td></tr>
				</table>
			</fieldset>			

			<input type="submit" value="Valider l'inscription" class="validate"/>
		</form>
	</div>	

<?php
	HTML_FOOTER();	
?>