<?php
	require_once 'engine.php';
	HTML_HEADER('Inscription Terminée');

	if(!isset($_POST["complement"])){
		$complement = null;
	}else{
		$complement = $_POST["complement"];
	}
	$result = SQL('INSERT INTO FICHE values(
						null, 
						"'.$_POST["nom"].'",	
						"'.$_POST["prenom"].'",	 
						'.$_POST["age"].', 
						"'.$_POST["sexe"].'", 
						"'.$_POST["adresse"].'", 
						"'.$_POST["codePostal"].'", 
						"'.strtoupper($_POST["ville"]).'", 		
						"'.$_POST["tel"].'", 
						"'.$_POST["mail"].'", 
						"'.$_POST["profession"].'", 
						"'.$complement.'"),
						null');
		
	if($result==true){
		echo "<div class='msg_0'>Votre inscription au tandem linguistique a bien été prise en compte. 
				Votre condidature sera examinée au plus vite.
				Vous serez informés par email lorsqu'un partenariat sera disponible.</div>";
		$result_id_fiche=SQL('select idFiche from FICHE where nomFiche="'.$_POST["nom"].'" and prenomFiche="'.$_POST["prenom"].'" and mail="'.$_POST["mail"].'" ');	
		$resultObjectIdFiche = $result_id_fiche->fetch_object();	
		$idFiche = $resultObjectIdFiche->idFiche;
		
		//récupération et insertion des langues parlées
		$languesMat = $_POST["langueMaternelle"];
		foreach($languesMat as $idLangue){
			if($idLangue=="new"){
				
				//TODO		
						
			}else{
				$result_insert_mat = SQL('insert into PARLE values('.$idFiche.', '.$idLangue.')');
			}
			
		}
	
	
		//Récupéraion et insertion des langues à perfectionner
		$languesPerf = $_POST["languePerfectionnement"];
		$niveauxLanguesPerf = $_POST["niveauLanguePerfectionnement"];
		$niveauxSysteme = $_POST["niveauLangueSysteme"];
		foreach($languesPerf as $idLangue){
			if($idLangue=="new"){
				
				//TODO		
					
			}else{
			$key = array_search($idLangue, $languesPerf);
			$result_insert_perf = SQL('INSERT INTO PERFECTIONNE VALUES(
												'.$idFiche.','.$idLangue.', "'.$niveauxLanguesPerf[$key].'", "'.$niveauxSysteme[$key].'");');
			}	
	}
	}else{
		echo "<div class='msg_1'>Un problème est survenu lors de votre inscritpion. veuillez réessayer.</div>";
	}			
	

	HTML_FOOTER();



?>