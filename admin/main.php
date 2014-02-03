<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Administration');
?>
<script>
function overLine(id)
{
	if(!(document.getElementById("ligneLangue"+id).className == "ligneFicheSelected"))
	{
		document.getElementById("ligneLangue"+id).className="ligneMouseOver";
		document.getElementById("ligne2Langue"+id).className="ligneMouseOver";
		document.getElementById("ligneNiveau"+id).className="ligneMouseOver";
		document.getElementById("ligne2Niveau"+id).className="ligneMouseOver";
		document.getElementById("ligneAge"+id).className="ligneMouseOver";
		document.getElementById("ligneSexe"+id).className="ligneMouseOver";
	}
}
function outLine(id)
{
	if(!(document.getElementById("ligneLangue"+id).className == "ligneFicheSelected"))
	{
		document.getElementById("ligneLangue"+id).className="ligneF";
		document.getElementById("ligne2Langue"+id).className="ligneF";
		document.getElementById("ligneNiveau"+id).className="ligneF";
		document.getElementById("ligne2Niveau"+id).className="ligneF";
		document.getElementById("ligneAge"+id).className="ligneF";
		document.getElementById("ligneSexe"+id).className="ligneF";
	}
}
function selectLine(id)
{
	var id2 = document.getElementById("lastLineClicked").innerHTML;
	if(!(id2 == 0))
	{
		document.getElementById("ligneLangue"+id2).className="ligneF";
		document.getElementById("ligne2Langue"+id2).className="ligneF";
		document.getElementById("ligneNiveau"+id2).className="ligneF";
		document.getElementById("ligne2Niveau"+id2).className="ligneF";
		document.getElementById("ligneAge"+id2).className="ligneF";
		document.getElementById("ligneSexe"+id2).className="ligneF";

	}
	document.getElementById("lastLineClicked").innerHTML=id;

	document.getElementById("ligneLangue"+id).className="ligneFicheSelected";
	document.getElementById("ligne2Langue"+id).className="ligneFicheSelected";
	document.getElementById("ligneNiveau"+id).className="ligneFicheSelected";
	document.getElementById("ligne2Niveau"+id).className="ligneFicheSelected";
	document.getElementById("ligneAge"+id).className="ligneFicheSelected";
	document.getElementById("ligneSexe"+id).className="ligneFicheSelected";

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
}
</script>

<table id="fiches">
<tr>
<td>
<table id="FichesTable">
    <thead>
        <tr>
            <td>Langue maternelle</td>
            <td>Langue de perfectionnement</td>
            <td>Niveau</td>
            <td><img id="logoUE" src="<?=SHORT_RACINE?>styles/flags/europe.png"/></td>
            <td>Age</td>
            <td>Sexe</td>
        </tr>
    </thead>
    <tbody><?php
        $query=SQL("select * from UTILISATEUR u, FICHE f group by idFiche order by idFiche desc");
		while($row=$query->fetch_object())
		{
			$queryLangueMat=SQL("select * from LANGUE where idLangue=".$row->idLangueMaternelle);
			$rowLangueMat=$queryLangueMat->fetch_object();
			$queryLanguePerf=SQL("select * from LANGUE where idLangue=".$row->idLanguePerfectionnement);
			$rowLanguePerf=$queryLanguePerf->fetch_object();
			
			echo '<tr style="background-color: lightgreen;" onclick="showFiche('.$row->idFiche.')" onmouseover="overLine('.$row->idFiche.')" onmouseout="outLine('.$row->idFiche.')">';
			if(!($rowLangueMat->imageDrapeau == null))
				echo '<td id="ligneLangue'.$row->idFiche.'" class="ligneF">'.$rowLangueMat->libelleLangue.' <img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLangueMat->imageDrapeau.'" /></td>';
			else
				echo '<td id="ligneLangue'.$row->idFiche.'" class="ligneF">'.$rowLangueMat->libelleLangue.'</td>';
			if(!($rowLanguePerf->imageDrapeau == null))
				echo '<td id="ligne2Langue'.$row->idFiche.'" class="ligneF">'.$rowLanguePerf->libelleLangue.' <img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLanguePerf->imageDrapeau.'" /></td>';
			else
				echo '<td id="ligne2Langue'.$row->idFiche.'" class="ligneF">'.$rowLanguePerf->libelleLangue.'</td>';
			echo '<td id="ligneNiveau'.$row->idFiche.'" class="ligneF">'.$row->niveauLanguePerfectionnement.'</td>';
			echo '<td id="ligne2Niveau'.$row->idFiche.'" class="ligneF">'.$row->niveauLangueSysteme.'</td>';
			echo '<td id="ligneAge'.$row->idFiche.'" class="ligneF">'.$row->age.'</td>';
			echo '<td id="ligneSexe'.$row->idFiche.'" class="ligneF">'.$row->sexe.'</td>';
			echo '</tr>';
		}
    ?></tbody>
</table>
</td>
<td>
<div id="hintFiche"></div>
</td>
<td>
<div id="hintMatch"></div>
</td>
</tr>
</table>
<div id="lastLineClicked" style="display:none">0</div>
<?php 
HTML_FOOTER();
?>
