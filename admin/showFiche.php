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
		echo '<div id="langue2" class="match'.$i.'">';
	else
		echo '<div id="langue">';
	$queryLangueMat=SQL("select * from PARLE where idFiche=".$row->idFiche);	
	while($rowLangueMat=$queryLangueMat->fetch_object())
	{
		$queryLangue = SQL("Select * from LANGUE where idLangue=".$rowLangueMat->idLangue);
		$rowLangue=$queryLangue->fetch_object();
		if(!($rowLangue->imageDrapeau == null))
			echo '<img class="flag" src="'.SHORT_RACINE.'styles/flags/'.$rowLangue->imageDrapeau.'" /> '.$rowLangue->libelleLangue.'<br /></div>';
		else
			echo ' -- '.$rowLangue->libelleLangue.'<br /></div>';
	}
	if($m>0)
	{
		echo '<div id="sexe2" class="match'.$i.'">Sexe : '.$row->sexe.'<br /></div>';
		echo '<div id="nom2" class="match'.$i.'">Nom : '.$row->nomFiche.'<br /></div>';
		echo '<div id="prenom2" class="match'.$i.'">Prénom : '.$row->prenomFiche.'<br /></div>';
		echo '<div id="age2" class="match'.$i.'">Age : '.$row->age.'<br /></div>';
		echo '<div id="prof2" class="match'.$i.'">Profession : '.$row->profession.'<br /></div>';
		echo '<div id="2langue2" class="match'.$i.'">Souhaite perfectionner : <br />';
	}
	else
	{
		echo '<div id="sexe">Sexe : '.$row->sexe.'<br /></div>';
		echo '<div id="nom">Nom : '.$row->nomFiche.'<br /></div>';
		echo '<div id="prenom">Prénom : '.$row->prenomFiche.'<br /></div>';
		echo '<div id="age">Age : '.$row->age.'<br /></div>';
		echo '<div id="prof">Profession : '.$row->profession.'<br /></div>';
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
		echo '<div id="adresse2" class="match'.$i.'">Adresse : '.$row->adresse.'<br /></div>';
		echo '<div id="cp2" class="match'.$i.'">Code postal : '.$row->codePostal.'<br /></div>';
		echo '<div id="ville2" class="match'.$i.'">Ville : '.$row->ville.'<br /></div>';
		echo '<div id="tel" class="match'.$i.'">Téléphone : '.$row->numeroTelephone.'<br /></div>';
		echo '<div id="email2" class="match'.$i.'">Email : '.$row->mail.'<br /></div>';
		echo '<div id="comp2" class="match'.$i.'">Complément : '.$row->complement.'<br /></div>';
	}
	else
	{
		echo '<div id="adresse">Adresse : '.$row->adresse.'<br /></div>';
		echo '<div id="cp">Code postal : '.$row->codePostal.'<br /></div>';
		echo '<div id="ville">Ville : '.$row->ville.'<br /></div>';
		echo '<div id="tel">Téléphone : '.$row->numeroTelephone.'<br /></div>';
		echo '<div id="email">Email : '.$row->mail.'<br /></div>';
		echo '<div id="comp">Complément : '.$row->complement.'<br /></div>';
	}
	echo '<div class="dev" id="idFiche">'.$row->idFiche.'</div></div>';

?>