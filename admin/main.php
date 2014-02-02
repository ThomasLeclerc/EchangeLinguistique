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

function showFiche(id){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("hintFiche").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","showFiche.php?id="+id,true);
    xmlhttp.send();
}
</script>


<table id="FichesTable">
    <thead>
        <tr>
            <td>Langue maternelle</td>
            <td>Langue de perfectionnement</td>
            <td>Niveau</td>
            <td><img id="logoUE" src="<?=SHORT_RACINE?>styles/flags/europe.png"/></td>
            <td>Age</td>
            <td>Sexe</td>
            <td>Ville</td>
            <td>Profession</td>
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
			
			echo '<tr style="background-color: lightgreen;" onclick="showFiche('.$row->idFiche.')">';
			if(!($rowLangueMat->imageDrapeau == null))
				echo '<td>'.$rowLangueMat->libelleLangue.' <img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLangueMat->imageDrapeau.'" /></td>';
			else
				echo '<td>'.$rowLangueMat->libelleLangue.'</td>';
			if(!($rowLanguePerf->imageDrapeau == null))
				echo '<td>'.$rowLanguePerf->libelleLangue.' <img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLanguePerf->imageDrapeau.'" /></td>';
			else
				echo '<td>'.$rowLanguePerf->libelleLangue.'</td>';
			echo '<td>'.$row->niveauLanguePerfectionnement.'</td>';
			echo '<td>'.$row->niveauLangueSysteme.'</td>';
			echo '<td>'.$row->age.'</td>';
			echo '<td>'.$row->sexe.'</td>';
			echo '<td>'.$row->ville.'</td>';
			echo '<td>'.$row->profession.'</td>';
			echo '</tr>';
		}
    ?></tbody>
</table>

<div id="hintFiche"></div>

<?php 
HTML_FOOTER();
?>
