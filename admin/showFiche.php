<?php
    require_once("../include/engine.php");
	if(!(isset($idFiche)))
	{
		$idFiche = $_GET["id"];
		$i=$idFiche;
	}	
	$query = SQL("Select * from FICHE where idFiche =".$idFiche);
	$row=$query->fetch_object();
	if(!(isset($m)))
		$m=0;
		
	if($m>0)
		echo '<div id="langue'.$i.'" class="match'.$i.'">';
	else
		echo '<div id="langue">';
	$queryLangueMat=SQL("select * from PARLE where idFiche=".$row->idFiche);	
	while($rowLangueMat=$queryLangueMat->fetch_object())
	{
		$queryLangue = SQL("Select * from LANGUE where idLangue=".$rowLangueMat->idLangue);
		$rowLangue=$queryLangue->fetch_object();
		if(!($rowLangue->imageDrapeau == null))
			echo '<img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLangue->imageDrapeau.'" /> '.$rowLangue->libelleLangue.'<br/>';
		else
			echo ' -- '.$rowLangue->libelleLangue.'<br/>';
	}
	if($m>0)
	{
		echo '<table><tr><td>Sexe : </td><td><div id="sexe'.$i.'" class="match'.$i.'">'.$row->sexe.'</div></td></tr></table>';
		echo '<table><tr><td>Nom : </td><td><div id="nom'.$i.'" class="match'.$i.'">'.$row->nomFiche.'</div></td></tr></table>';
		echo '<table><tr><td>Prénom : </td><td><div id="prenom'.$i.'" class="match'.$i.'">'.$row->prenomFiche.'</div></td></tr></table>';
		echo '<table><tr><td>Age : </td><td><div id="age'.$i.'" class="match'.$i.'">'.$row->age.'</div></td></tr></table>';
		echo '<table><tr><td>Profession : </td><td><div id="prof'.$i.'" class="match'.$i.'">'.$row->profession.'</div></td></tr></table><hr />';
		echo 'Souhaite perfectionner : <div id="2langue'.$i.'" class="match'.$i.'">';
	}
	else
	{
		echo '<table><tr><td>Sexe : </td><td><div id="sexe">'.$row->sexe.'</div></td></tr></table>';
		echo '<table><tr><td>Nom : </td><td><div id="nom">'.$row->nomFiche.'</div></td></tr></table>';
		echo '<table><tr><td>Prénom : </td><td><div id="prenom">'.$row->prenomFiche.'</div></td></tr></table>';
		echo '<table><tr><td>Age : </td><td><div id="age">'.$row->age.'</div></td></tr></table>';
		echo '<table><tr><td>Profession : </td><td><div id="prof">'.$row->profession.'</div></td></tr></table><hr />';
		echo 'Souhaite perfectionner : <div id="2langue">';
	}
	$queryLanguePerf=SQL("select * from PERFECTIONNE where idFiche=".$row->idFiche);
	//pour chaque langue perfectionnee
	while($rowLanguePerf=$queryLanguePerf->fetch_object())
	{
		$queryLangue = SQL("Select * from LANGUE where idLangue=".$rowLanguePerf->idLangue);
		$rowLangue=$queryLangue->fetch_object();
		//si il y a un drapeau
		if(!($rowLangue->imageDrapeau == null))
			//on affiche le libelle avec l'image
			echo '<img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLangue->imageDrapeau.'" /> '.$rowLangue->libelleLangue;
		//sinon
		else
			//on affiche le libelle sans l'image
			echo ' -- '.$rowLangue->libelleLangue.' - '.$rowLanguePerf->niveau;
		//on affiche le niveau
		echo ' - '.$rowLanguePerf->niveau;
		//si le niveau europeen est renseigné
		if(!($rowLanguePerf->niveauUE==null))
			//on l'affiche
			echo ' - '.$rowLanguePerf->niveauUE;
		echo '</div>';
	}
	if($m>0)
	{
		echo '<hr /><table><tr><td>Adresse : </td><td><div id="adresse'.$i.'" class="match'.$i.'">'.$row->adresse.'</div></td></tr></table>';
		echo '<table><tr><td>Code postal : </td><td><div id="cp'.$i.'" class="match'.$i.'">'.$row->codePostal.'</div></td></tr></table>';
		echo '<table><tr><td>Ville : </td><td><div id="ville'.$i.'" class="match'.$i.'">'.$row->ville.'</div></td></tr></table>';
		echo '<table><tr><td>Téléphone : </td><td><div id="tel'.$i.'" class="match'.$i.'">'.$row->numeroTelephone.'</div></td></tr></table>';
		echo '<table><tr><td>Email : </td><td><div id="email'.$i.'" class="match'.$i.'">'.$row->mail.'</div></td></tr></table>';
		echo '<table><tr><td>Complément : </td></tr></table><div id="comp'.$i.'" class="match'.$i.'">'.$row->complement.'</div>';
		echo '<div class="dev" class="match'.$i.'" id="idFicheMatch'.$i.'">'.$row->idFiche.'</div></div>';
	}
	else
	{
		echo '<hr /><table><tr><td>Adresse : </td><td><div id="adresse">'.$row->adresse.'</div></td></tr></table>';
		echo '<table><tr><td>Code postal : </td><td><div id="cp">'.$row->codePostal.'</div></td></tr></table>';
		echo '<table><tr><td>Ville : </td><td><div id="ville">'.$row->ville.'</div></td></tr></table>';
		echo '<table><tr><td>Téléphone : </td><td><div id="tel">'.$row->numeroTelephone.'</div></td></tr></table>';
		echo '<table><tr><td>Email : </td><td><div id="email">'.$row->mail.'</div></td></tr></table>';
		echo '<table><tr><td>Complément : </td></tr></table><div id="comp">'.$row->complement.'</div>';
		echo '<div class="dev" id="idFicheMatch">'.$row->idFiche.'</div></div>';
	}

?>