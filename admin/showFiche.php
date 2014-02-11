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
			echo '<img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLangue->imageDrapeau.'" /> '.$rowLangue->libelleLangue.'</div>';
		else
			echo ' -- '.$rowLangue->libelleLangue.'</div>';
	}
	if($m>0)
	{
		echo '<div id="sexe'.$i.'" class="match'.$i.'">Sexe : '.$row->sexe.'</div>';
		echo '<div id="nom'.$i.'" class="match'.$i.'">Nom : '.$row->nomFiche.'</div>';
		echo '<div id="prenom'.$i.'" class="match'.$i.'">Prénom : '.$row->prenomFiche.'</div>';
		echo '<div id="age'.$i.'" class="match'.$i.'">Age : '.$row->age.'</div>';
		echo '<div id="prof'.$i.'" class="match'.$i.'">Profession : '.$row->profession.'</div><hr />';
		echo '<div id="2langue'.$i.'" class="match'.$i.'">Souhaite perfectionner : <br />';
	}
	else
	{
		echo '<div id="sexe">Sexe : '.$row->sexe.'</div>';
		echo '<div id="nom">Nom : '.$row->nomFiche.'</div>';
		echo '<div id="prenom">Prénom : '.$row->prenomFiche.'</div>';
		echo '<div id="age">Age : '.$row->age.'</div>';
		echo '<div id="prof">Profession : '.$row->profession.'</div><hr />';
		echo '<div id="2langue">Souhaite perfectionner : <br />';
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
		echo '<br /></div>';
	}
	if($m>0)
	{
		echo '<hr /><div id="adresse'.$i.'" class="match'.$i.'">Adresse : '.$row->adresse.'<br /></div>';
		echo '<div id="cp'.$i.'" class="match'.$i.'">Code postal : '.$row->codePostal.'<br /></div>';
		echo '<div id="ville'.$i.'" class="match'.$i.'">Ville : '.$row->ville.'<br /></div>';
		echo '<div id="tel'.$i.'" class="match'.$i.'">Téléphone : '.$row->numeroTelephone.'<br /></div>';
		echo '<div id="email'.$i.'" class="match'.$i.'">Email : '.$row->mail.'<br /></div>';
		echo '<div id="comp'.$i.'" class="match'.$i.'">Complément : '.$row->complement.'<br /></div>';
		echo '<div class="dev" class="match'.$i.' id="idFicheMatch'.$i.'">'.$row->idFiche.'</div></div>';
	}
	else
	{
		echo '<hr /><div id="adresse">Adresse : '.$row->adresse.'<br /></div>';
		echo '<div id="cp">Code postal : '.$row->codePostal.'<br /></div>';
		echo '<div id="ville">Ville : '.$row->ville.'<br /></div>';
		echo '<div id="tel">Téléphone : '.$row->numeroTelephone.'<br /></div>';
		echo '<div id="email">Email : '.$row->mail.'<br /></div>';
		echo '<div id="comp">Complément : '.$row->complement.'<br /></div>';
		echo '<div class="dev" id="idFicheMatch'.$i.'">'.$row->idFiche.'</div></div>';
	}

?>