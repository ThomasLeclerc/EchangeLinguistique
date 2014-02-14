"<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Administration');
?>
<script>

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

    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("hintFiche").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","showFiche.php?id="+id,true);
    xmlhttp.send();

	document.getElementById("hintFiche").style.visibility="visible";
	showMatch(id);
}
function showMatch(id){

	xmlhttp2=new XMLHttpRequest();
    xmlhttp2.onreadystatechange=function(){
    	if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
        {
            document.getElementById("hintMatch").innerHTML=xmlhttp2.responseText;
        }
    }
    xmlhttp2.open("GET","showMatch.php?id="+id,true);
    xmlhttp2.send();

	document.getElementById("hintMatch").style.visibility="visible";
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
				}	);
		}
	});
});
</script>
<div id="result"></div>
<table id="fiches">
<tr>
<td>
<div id="divFichesTable">
<table id="FichesTable">
    <thead>
        <tr>
            <td>Langue maternelle</td>
            <td>Langue de <br/>perfectionnement (Niveau) </td>
            <td>Age</td>
            <td>Sexe</td>
        </tr>
    </thead>
    <tbody><?php

        $query=SQL("select * from FICHE where idLink is null group by idFiche order by idFiche asc");

		while($row=$query->fetch_object())
		{
			$queryLangueMat=SQL("select * from PARLE where idFiche=".$row->idFiche);
			$queryLanguePerf=SQL("select * from PERFECTIONNE where idFiche=".$row->idFiche);
			$j = 0;
			$k = 0;		
			echo '<tr id="trLangue'.$row->idFiche.'" onclick="showFiche('.$row->idFiche.')" >';
			echo '<td><table id="ligneLangue'.$row->idFiche.'" class="ligneF">';
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
			echo '</tr></table></td><td><table id="ligne2Langue'.$row->idFiche.'" class="ligneF" >';
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
			echo '<td id="ligneAge'.$row->idFiche.'" class="ligneF">'.$row->age.'</td>';
			echo '<td id="ligneSexe'.$row->idFiche.'" class="ligneF">'.$row->sexe.'</td>';
			echo '</tr>';
		}
    ?></tbody>
</table>
</div>
</td>
<td>
<fieldset id="hintFiche" style="visibility:hidden;"></fieldset>
</td>
<td id="hintMatch" >
</td>
</tr>
</table>
<div id="lastLineClicked" style="display:none">0</div>
<?php 
HTML_FOOTER();
?>
