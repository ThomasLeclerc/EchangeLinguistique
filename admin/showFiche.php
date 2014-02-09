<?php
    require_once("../include/engine.php");
	if(!(isset($idFiche)))
	{
		$idFiche = $_GET["id"];
		$i=$idFiche;
	}	
	$query = SQL("Select * from FICHE where idFiche =".$idFiche);
	$row=$query->fetch_object();
	if(isset($_GET['m']))
		$m=1;
	else
		$m=0;
	if($m==0)
		echo '<div id="langue2" class="match'.$i.'">';
	else
		echo '<div id="langue">';		
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
	echo '</div>';
	if($m==0)
		echo '<div id="sexe2" class="match'.$i.'">';
	else
		echo '<div id="sexe">';
	echo 'Sexe : '.$row->sexe.'<br /></div></div>';
	if($m==0)
		echo '<div id="nom2" class="match'.$i.'">';
	else
		echo '<div id="nom">';
	echo 'Nom : '.$row->nomFiche.'<br /></div>';
	if($m==0)
		echo '<div id="prenom2" class="match'.$i.'">';
	else
		echo '<div id="prenom">';
	echo 'Prénom : '.$row->prenomFiche.'<br /></div>';
	if($m==0)
		echo '<div id="age2" class="match'.$i.'">';
	else
		echo '<div id="age">';
	echo 'Age : '.$row->age.'<br /></div>';
	if($m==0)
		echo '<div id="prof2" class="match'.$i.'">';
	else
		echo '<div id="prof">';
	echo 'Profession : '.$row->profession.'<br /></div>';
	if($m==0)
		echo '<div id="2langue2" class="match'.$i.'">';
	else
		echo '<div id="2langue">';
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
			echo '<br /></div>';
		}
		else
		{
			echo ' -- '.$rowLangue->libelleLangue.' - '.$rowLanguePerf->niveau;
			if(!($rowLanguePerf->niveauUE==null))
				echo ' - '.$rowLanguePerf->niveauUE;
			echo '<br /></div>';
		}
	}
	if($m==0)
		echo '<div id="adresse2" class="match'.$i.'">';
	else
		echo '<div id="adresse">';
	echo 'Adresse : '.$row->adresse.'<br /></div>';
	if($m==0)
		echo '<div id="cp2" class="match'.$i.'">';
	else
		echo '<div id="cp">';
	echo 'Code postal : '.$row->codePostal.'<br /></div>';
	if($m==0)
		echo '<div id="ville2" class="match'.$i.'">';
	else
		echo '<div id="ville">';
	echo 'Ville : '.$row->ville.'<br /></div>';
	if($m==0)
		echo '<div id="tel" class="match'.$i.'">';
	else
		echo '<div id="tel">';
	echo 'Téléphone : '.$row->numeroTelephone.'<br /></div>';
	if($m==0)
		echo '<div id="email2" class="match'.$i.'">';
	else
		echo '<div id="email">';
	echo 'Email : '.$row->mail.'<br /></div>';
	if($m==0)
		echo '<div id="comp2" class="match'.$i.'">';
	else
		echo '<div id="comp">';
	echo 'Complément : '.$row->complement.'<br /></div>';
	if($m==0)
		echo '<div classe="dev" id="devIdFiche2">';
	else
		echo '<div classe="dev" id="devIdFiche">';
	echo '<div class="dev" id="idFiche">'.$row->idFiche.'</div></div>';

?>