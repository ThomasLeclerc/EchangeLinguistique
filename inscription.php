	<?php
require_once 'include/engine.php';

HTML_HEADER('INSCRIPTION');

$result=SQL("SELECT * FROM LANGUE");
$htmlSelectLangue = "<option value=''>";
while($resultat=$result->fetch_object()){
	$htmlSelectLangue .= "<option value='".$resultat->idLangue."'>".$resultat->libelleLangue;
}
$htmlSelectLangue .= "<option value='new'>Autre ..."

?>
<script>	

	function deleteLanguePerf(id){
		$('#languePerfectionnement'+id).remove();
		$('#niveauLanguePerfectionnement'+id).remove();
		$('#niveauLangueSysteme'+id).remove();
		$('#deleteLanguePerf'+id).remove();
	}	
	function deleteLangueMat(id){
		$('#langueMaternelle'+id).remove();
		$('#langueMaternelle'+id+'New').remove();
		$('#deleteLangueMat'+id).remove();
	}
$(document).ready(function(){
	var idPerf = 1	;
	var idMat = 1;
	
	 var emailok = false;
    var formInscription = $("#form_inscription"), email = $("#mail"), emailInfo = $("#emailInfo");
  
	 formInscription.submit(function(){
        if(!emailok)
        {
				emailInfo.html("Ce mail est déjà utilisé");
            email.focus();
            return false;
        }
    });  
  
    //send ajax request to check email
    email.blur(function(){
			if($(this).attr("value")!=""){
	      	$.ajax({
					type: "POST",
					data: "email="+$(this).attr("value"),
					url: "include/verifMail.php",
					success: function(data){
					    if(data != "0")
					    {
					        	emailok = false;
					        	$("#tdMail").css("background-color","rgba(255,150,150,0.8)");
					      	emailInfo.html("Ce mail est déjà utilisé");
								
					    }
					    else
					    {
					        emailok = true;
					        emailInfo.html("");
					        $("#tdMail").css("background-color","rgba(255,255,255,1)");
					    }
					}
				});
        }else{
        		emailInfo.html("");
        }
    });	
	
	
	
	
	function newListLangueMat(){
		var Html = "<div class='listLangueMat'>";
		Html += "<select name='langueMaternelle[]' id='langueMaternelle"+idMat+"' class='listeLangues'><?=$htmlSelectLangue?></select>";
		Html += "</select>";	
	
		Html += "<input type='button' value='-' id='deleteLangueMat"+idMat+"' title='Supprimer cette langue' alt='Supprimer cette langue' onclick='deleteLangueMat("+idMat+");'/>";		
		Html += "<div id='langueMaternelle"+idMat+"New'></div></div>";	
		idMat++;
		$("#TdLangueMaternelle").append(Html);
	}
	
	function newListLanguePerf(){
		var Html = "<div class='listLanguePerf'>";
		Html += "<select name='languePerfectionnement[]' id='languePerfectionnement"+idPerf+"' class='listeLangues' ><?=$htmlSelectLangue?></select>";
		Html += "<select name='niveauLanguePerfectionnement[]"+idPerf+"' id='niveauLanguePerfectionnement"+idPerf+"' >";
		Html += "	<option value='Debutant'>débutant";
		Html += "	<option value='Intermediaire'>intermédiaire";	
		Html += "	<option value='Avance'>avancé";	
		Html += "</select>";	
		
		Html += "<select name='niveauLangueSysteme[]' id='niveauLangueSysteme"+idPerf+"'>";
		Html += "	<option value='no'>je ne sais pas";
		Html += "	<option value='A1'>A1";
		Html += "	<option value='A2'>A2";	
		Html += "	<option value='B1'>B1";
		Html += "	<option value='B2'>B2";
		Html += "	<option value='C1'>C1";	
		Html += "	<option value='C2'>C2";		
		Html += "</select><input type='button' value='-' id='deleteLanguePerf"+idPerf+"' title='Supprimer cette langue' alt='Supprimer cette langue' onclick='deleteLanguePerf("+idPerf+");'/>";		
		Html += "<div id='languePerfectionnement"+idPerf+"New'></div></div>"	
		idPerf++;
		$("#TdLanguePerfectionnement").append(Html);
	}
	
	$("#ajouterLanguePerf").live("click", function () {
		newListLanguePerf();
	});
	
	$("#ajouterLangueMat").live("click", function () {
		newListLangueMat();
	});
	


	
});

$("#content").on("click", ".listeLangues", function() {
   $( ".listeLangues" ).change(function() {		
		var idOption = $(this).attr("id");
		var option = $( "#"+idOption+" option:selected" ).val();	
		if(option=="new"){
			$("#"+idOption+"New").html("<input type='text' name='"+idOption+"NewInput' id='"+idOption+"NewInput' placeholder='autre langue' size=10/>");
		}else{
			$("#"+idOption+"New").html("");
		}
	});
});



</script>


<div id="FormulaireInscr">
	<h2>Demande pour un tandem linguistique</h2>
	<!--<form action="include/validation.php" method=post id="form_inscription">-->
	<form action="include/verifMail.php" method="post" id="form_inscription">
	<small>* champs obligatoires  </small>
	<fieldset>
	<legend><h4>Langues</h4></legend>
		<table>
			<tr>
				<td>Quelle est votre langue maternelle ou <br/>la langue que vous parlez couramment ? <small>*</small> </td>
				<td id="TdLangueMaternelle">
					<select name="langueMaternelle[]" id="langueMaternelle" class="listeLangues" required>
						<?=$htmlSelectLangue?>
					</select>
					
					<input type="button" id="ajouterLangueMat" title="Langue supplémentaire" value="+"/> <br/>
					<div id="langueMaternelleNew"></div>
				</td>
			</tr>
			<tr><td colspan="2"><hr></td></tr>
			<tr>
				<td>La langue que vous souhaitez perfectionner ? <small>*</small></td>
				<td id="TdLanguePerfectionnement">
					<div class="listLanguePerf">
						<select name='languePerfectionnement[]' class="listeLangues" id="languePerfectionnement" required><?=$htmlSelectLangue?></select>
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
					
						<div id="languePerfectionnementNew"></div>
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
				<td><label for="prenom">Prénom <small>*</small> : </label></td>
				<td><input type="text" name="prenom" id="prenom" required/></td>
			</tr><tr>
				<td><label for="nom">Nom <small>*</small> : </label></td>
				<td><input type="text" name="nom" id="nom" required/></td>
			</tr><tr>
				<td><label for="age">Votre âge <small>*</small> : </label></td>
				<td><input type="number" name="age" id="age" title="Minimum 2 chiffres" maxlength="3" pattern="[0-9]{2,3}" size=1 required/></td>
			</tr><tr>
				<td>Votre civilité <small>*</small> : </td>
				<td>
					<input type="radio" name="sexe" id="M" value="M" required ><label for="M">Homme</label>
					<input type="radio" name="sexe" id="F" value="F" required ><label for="F">Femme</label> 
				</td>
			</tr><tr>
				<td><label for="adresse">Votre adresse<small>*</small> : </label></td>
				<td><input type="text" name="adresse" id="adresse" required/></td>
			</tr><tr>
				<td><label for="codePostal">Code postale <small>*</small> : </label></td>
				<td><input type="number" name="codePostal" id="codePostal" size=1 maxlength=5 pattern="[0-9]{5}" title="5 chiffres" required/></td>
			</tr><tr>
				<td><label for="ville">Ville <small>*</small> : </label></td>
				<td><input type="text" name="ville" id="ville" size=10 required/></td>
			</tr><tr>
				<td><label for="tel">Votre numéro de téléphone <small>*</small> : </label></td>
				<td><input type="tel" name="tel" id="tel" maxlength="10" title="10 chiffres" pattern="^0[1-9][0-9]{8}$" size=4 required/></td>
			</tr><tr>
				<td><label for="mail">Votre adresse mail <small>*</small> : </label></td>
				<td id="tdMail"><input type="email" name="mail" id="mail" size=30 required/><div id="emailInfo" class="invalid_field"></div></td>
			</tr>
		</table>
		</fieldset><fieldset>
		<legend><h4>Parlez-nous de vous</h4></legend>
		<table>
			<tr>
				<td><label for="profession">Quelles études poursuivez-vous / <br/>quelle est votre profession ? <small>*</small> : </label></td>
				<td><input type="text" name="profession" id="profession"  maxsize=250 size=30 required/></td>
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
		<input type="submit" value="Valider l'inscription" id="validButtons" class="validate"/>
	</form>
</div>


<?php

HTML_FOOTER();
?>
