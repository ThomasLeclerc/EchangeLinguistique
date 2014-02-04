<?php
    require_once("../include/engine.php");
	if(!(isset($idFiche)))
		$idFiche = $_GET["id"];
		
	$query = SQL("Select * from FICHE where idFiche =".$idFiche);
	$row=$query->fetch_object();

	$queryLangueMat=SQL("select * from PARLE where idFiche=".$row->idFiche);	
	while($rowLangueMat=$queryLangueMat->fetch_object())
	{
		$queryLangue = SQL("Select * from LANGUE where idLangue=".$rowLangueMat->idLangue);
		$rowLangue=$queryLangue->fetch_object();
		if(!($rowLangue->imageDrapeau == null))
			echo '<img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLangue->imageDrapeau.'" /> '.$rowLangue->libelleLangue.'<br />';
		else
			echo ' -- '.$rowLangue->libelleLangue.'<br />';
	}

	echo 'Sexe : '.$row->sexe.'<br />';
	echo 'Nom : '.$row->nomFiche.'<br />';
	echo 'Prénom : '.$row->prenomFiche.'<br />';
	echo 'Age : '.$row->age.'<br />';
	echo 'Profession : '.$row->profession.'<br />';
	echo 'Souhaite perfectionner : <br />';

	$queryLanguePerf=SQL("select * from PERFECTIONNE where idFiche=".$row->idFiche);
	while($rowLanguePerf=$queryLanguePerf->fetch_object())
	{
		$queryLangue = SQL("Select * from LANGUE where idLangue=".$rowLanguePerf->idLangue);
		$rowLangue=$queryLangue->fetch_object();	
		if(!($rowLangue->imageDrapeau == null))
		{
			echo '<img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLangue->imageDrapeau.'" /> '.$rowLangue->libelleLangue;
			echo ' - '.$rowLanguePerf->niveau;
			if(!($rowLanguePerf->niveauUE==null))
			{
				echo ' - '.$rowLanguePerf->niveauUE;
			}
			echo '<br />';
		}
		else
		{
			echo ' -- '.$rowLangue->libelleLangue.' - '.$rowLanguePerf->niveau;
			if(!($rowLanguePerf->niveauUE==null))
				echo ' - '.$rowLanguePerf->niveauUE;
			echo '<br />';
		}
	}
	echo 'Adresse : '.$row->adresse.'<br />';
	echo 'Code postal : '.$row->codePostal.'<br />';
	echo 'Ville : '.$row->ville.'<br />';
	echo 'Téléphone : '.$row->numeroTelephone.'<br />';
	echo 'Email : '.$row->mail.'<br />';
	echo 'Complément : '.$row->complement.'<br />';

?>