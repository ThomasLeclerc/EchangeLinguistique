<?php
// Moteur + v�rif des droits
require_once '../include/engine.php';
// Si non connect�
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Administration');
?>
<script>
function deleteFiche(id)
{
	
	//on affiche la confirm box
	if(confirm("Cette fiche sera supprim�e d�finitivement. Un mail sera envoy� � la personne concern�e"+id))
	{
		$.post(	'delFiche.php',
			{ num: id }, 
			function(returnedData)
			{
				console.log(returnedData);
				location.reload(true);
			}
		);
	}
}
function selectLine(id)
{
	var id2 = $("#lastLineClicked").html();
	if(id2 != 0)
	{
		$("#trLangue"+id2).removeClass("ligneFicheSelected");
		$("#trLangue"+id2).addClass("ligneF");

	}
	$("#lastLineClicked").html(id);
	$("#trLangue"+id).removeClass("ligneF");
	$("#trLangue"+id).addClass("ligneFicheSelected");
}
function showFiche(id){

	selectLine(id);
	
	$.post(	'showFiche.php',
		{ id: id}, 
		function(returnedData){
			$('#hintFiche').html(returnedData);
			document.getElementById("hintFiche").style.visibility="visible";
			showMatch(id);
	});

}
function showMatch(id){

	$.post(	'showMatch.php',
		{ id: id}, 
		function(returnedData){
			$('#hintMatch').html(returnedData);
			document.getElementById("hintMatch").style.visibility="visible";
	});
}

$(document).ready(function(){
	//click sur la fleche de gauche
	$("#butAv").live("click", function ()
	{
		//si c'est la 1ere fiche qui est affichee
		if($("#numMatch").html()=="1")
		{
			//on cache la fiche 1
			$(".match1").css("display", "none");
			
			//on remplace numMatch par la valeur de la derniere fiche (celle avant 1)
			$("#numMatch").html($("#nbMatch").html());
			
			//on selectionne la nouvelle fiche
			$selector=".match" + $("#numMatch").html();
			//on l'affiche
			$($selector).css("display", "block");
			
			//on affiche la legende
			$numFiche = $("#numMatch").html();
			$nbMatch = $("#nbMatch").html();
			$("#leg").html("<table><tr><td><input type='button' id='butAv' value='<' /></td><td><h5>" + $("#numMatch").html() + " / " + $("#nbMatch").html() + "</h5></td><td><input id='butAp' value='>' type='button' /></td></tr></table>");

		}
		//sinon
		else
		{
			//on selectionne la fiche qui est affichee
			$selector=".match" + $("#numMatch").html();
			//on la cache
			$($selector).css("display", "none");
			
			//on remplace numMatch par la fiche d'avant
			$("#numMatch").html($("#numMatch").html()-1);
			
			//on selectionne la nouvelle fiche
			$selector=".match" + $("#numMatch").html();
			//on l'affiche
			$($selector).css("display", "block");

			//on affiche la legende
			$numFiche = $("#numMatch").html();
			$nbMatch = $("#nbMatch").html();
			$("#leg").html("<table><tr><td><input type='button' id='butAv' value='<' /></td><td><h5>" + $numFiche + " / " + $nbMatch + "</h5></td><td><input id='butAp' value='>' type='button' /></td></tr></table>");


		}
	});
	//click sur la fleche de droite
	$("#butAp").live("click", function ()
	{
		//si c'est la derniere fiche qui est affichee
		if($("#numMatch").html()==$("#nbMatch").html())
		{
			//on masque la fiche affichee
			$selector=".match" + $("#numMatch").html();
			$($selector).css("display", "none");
			
			//on remplace numMatch par la 1ere fiche
			$("#numMatch").html("1");

			//on affiche la fiche 1
			$(".match1").css("display", "block");

			//on affiche la legende
			$numFiche = $("#numMatch").html();
			$nbMatch = $("#nbMatch").html();
			$("#leg").html("<table><tr><td><input type='button' id='butAv' value='<' /></td><td><h5>" + $numFiche + " / " + $nbMatch + "</h5></td><td><input id='butAp' value='>' type='button' /></td></tr></table>");
		}
		//sinon
		else
		{
			//on cache la fiche affichee
			$selector=".match" + $("#numMatch").html();
			$($selector).css("display", "none");
			
			//on incremente le numero de la fiche affichee
			var v= parseInt($("#numMatch").html());
			v++;
			$("#numMatch").html(v);
			
			//on affiche la nouvelle fiche
			$selector=".match" + $("#numMatch").html();
			$($selector).css("display", "block");
			
			//on met a jour la legende
			$numFiche = $("#numMatch").html();
			$nbMatch = $("#nbMatch").html();
			$("#leg").html("<table><tr><td><input type='button' id='butAv' value='<' /></td><td><h5>" + $numFiche + " / " + $nbMatch + "</h5></td><td><input id='butAp' value='>' type='button' /></td></tr></table>");
		}
	});
	//click sur le bouton association
	$("#butMatch").live("click", function ()
	{		
		//on recupere le numero de la fiche match affichee
		$numMatch = $("#numMatch").html();

		//on recupere les id des fiches a lier
		$idFiche1 = $("#hintFiche #idFicheMatch").html();
		$idFiche2 = $("#hintMatch #idFicheMatch"+$numMatch).html();
		
		//on prepare les selecteur pour l'affichage de la confirmation
		$prenom2 = "#hintMatch #prenom"+$numMatch;
		$nom2 = "#hintMatch #nom"+$numMatch;
		
		//on affiche la confirm box
		if(confirm(	$("#hintFiche #prenom").html() + " " + $("#hintFiche #nom").html()
				+	" et "
				+ 	$($prenom2).html() + " " + $($nom2).html()
				+	" vont etre lies."))
		{
		$.post(	'linkRequest.php',
				{ id1: $idFiche1, id2 : $idFiche2}, 
				function(returnedData){
					console.log(returnedData);
					location.reload();
				}	);
		}
	});
});
</script>
<div id="result"></div>
<table id="fiches">
<tr>
<td>
	<div class="divFichesTable"><table class="FichesTable">
			<thead>
				<tr>
				    <td>Langue maternelle</td>
				    <td>Langue de <br/>perfectionnement (Niveau) </td>
				    <td>Age</td>
				    <td>Sexe</td>
				    <td></td>
				</tr>
			</thead>
			<tbody><?php

				$query=SQL("select * from FICHE where idLink is null and idTandem is null group by idFiche order by idFiche asc");

				while($row=$query->fetch_object())
				{
					$queryLangueMat=SQL("select * from PARLE where idFiche=".$row->idFiche);
					$queryLanguePerf=SQL("select * from PERFECTIONNE where idFiche=".$row->idFiche);
					$j = 0;
					$k = 0;		
					echo '<tr id="trLangue'.$row->idFiche.'" class="ligneF" onclick="showFiche('.$row->idFiche.')" >';
					echo '<td><table id="ligneLangue'.$row->idFiche.'">';
					while($rowLangueMat=$queryLangueMat->fetch_object())
					{
						$j++;
						echo '<tr>';
						$queryFlag=SQL("select * from LANGUE where idLangue=".$rowLangueMat->idLangue);
						$rowFlag=$queryFlag->fetch_object();
						if(!($rowFlag->imageDrapeau == null))
							echo '<td><img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowFlag->imageDrapeau.'"/> '.$rowFlag->libelleLangue.'</td></tr>';
						else
							echo '<td>'.$rowFlag->libelleLangue.'</td></tr>';
					}
					echo '</tr></table></td><td><table id="ligne2Langue'.$row->idFiche.'" >';
					while($rowLanguePerf=$queryLanguePerf->fetch_object())
					{
						$k++;
						echo '<tr>';
						$queryFlag=SQL("select * from LANGUE where idLangue=".$rowLanguePerf->idLangue);
						$rowFlag=$queryFlag->fetch_object();
						if(!($rowFlag->imageDrapeau == null))
							echo '<td><img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowFlag->imageDrapeau.'"/> '.$rowFlag->libelleLangue;
						else
							echo '<td>'.$rowFlag->libelleLangue;
						echo ' ('.$rowLanguePerf->niveau;
						if($rowLanguePerf->niveauUE!="no")
							echo ' - '.$rowLanguePerf->niveauUE.')</td></tr>';
						else
						echo ')</td></tr>';
					}
					echo '</tr></table></td>';
					echo '<td id="ligneAge'.$row->idFiche.'" >'.$row->age.'</td>';
					echo '<td id="ligneSexe'.$row->idFiche.'" >'.$row->sexe.'</td>';
					echo '<td><button type="button" onClick="deleteFiche('.$row->idFiche.');"><img src="../styles/delete.png" ></button></td>';
					echo '</tr>';
				}
			?></tbody>
		</table></div>
</td>
<td>
<div id="hintFiche" class="ficheParticipant" style="visibility:hidden;"></div>
</td>
<td id="hintMatch" >
</td>
</tr>
</table>
<div id="lastLineClicked" style="display:none">0</div>
<?php 
HTML_FOOTER();
?>
