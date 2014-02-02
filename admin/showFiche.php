<?php
    require_once("../include/engine.php");

    $idFiche = $_GET["id"];
    
    $query = SQL("Select * from FICHE where idFiche =".$idFiche);
	$row=$query->fetch_object();
	
	$queryLangueMat = SQL("Select * from LANGUE where idLangue=".$row->idLangueMaternelle);
	$rowLangueMat=$queryLangueMat->fetch_object();
	
	$queryLanguePerf = SQL("Select * from LANGUE where idLangue=".$row->idLanguePerfectionnement);
	$rowLanguePerf=$queryLanguePerf->fetch_object();

	echo '<fieldset>';
	if(!($rowLangueMat->imageDrapeau == null))
		echo '<img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLangueMat->imageDrapeau.'" /> '.$rowLangueMat->libelleLangue.'<br />';
	else
		echo $rowLangueMat->libelleLangue.'<br />';
	echo 'Sexe : '.$row->sexe.'<br />';
    echo 'Nom : '.$row->nomFiche.'<br />';
    echo 'Prénom : '.$row->prenomFiche.'<br />';
	echo 'Age : '.$row->age.'<br />';
	echo 'Profession : '.$row->profession.'<br />';
	echo 'Souhaite perfectionner : ';
	if(!($rowLanguePerf->imageDrapeau == null))
		echo '<img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLanguePerf->imageDrapeau.'" /> '.$rowLanguePerf->libelleLangue.'<br />';
	else
		echo $rowLanguePerf->libelleLangue.'<br />';
	echo 'Niveau : '.$row->niveauLanguePerfectionnement.'<br />';
	if(!($row->niveauLangueSysteme==null))
		echo 'Niveau européen : '.$row->niveauLangueSysteme.'<br />';
    echo 'Adresse : '.$row->adresse.'<br />';
    echo 'Code postal : '.$row->codePostal.'<br />';
    echo 'Ville : '.$row->ville.'<br />';
    echo 'Téléphone : '.$row->numeroTelephone.'<br />';
    echo 'Email : '.$row->mail.'<br />';
    echo 'Complément : '.$row->complement.'<br />';
	echo '</fieldset>';
?>