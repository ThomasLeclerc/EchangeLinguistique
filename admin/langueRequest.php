<?php
    require_once("../include/engine.php");
	// Si non connecté
	if(!isset($_SESSION['id'])) 
		REDIRECT('../login.php');
	
	if($_POST['nom']!="")
	{
		if ($_FILES['flag']['error'] > 0) $erreur = "Erreur lors du transfert";
		$maxsize=$_POST['MAX_FILE_SIZE'];
		if ($_FILES['flag']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
		$extensions_valides = array( 'jpg' , 'gif' , 'png' );
		//1. strrchr renvoie l'extension avec le point (« . »).
		//2. substr(chaine,1) ignore le premier caractère de chaine.
		//3. strtolower met l'extension en minuscules.
		$extension_upload = strtolower(  substr(  strrchr($_FILES['flag']['name'], '.')  ,1)  );
		if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
		$langue=$_POST['nom'];
		$nom = "../styles/flags/".$langue.".{$extension_upload}";
		$resultat = move_uploaded_file($_FILES['flag']['tmp_name'],$nom);
		if ($resultat)
			$queryAdd=SQL('insert into LANGUE values(null, "'.$langue.'", "'.$langue.'.{$extension_upload}")');
		else
			$queryAdd=SQL('insert into LANGUE values(null, "'.$langue.'", null)');		
	}
	else
	{
		echo "Vous n'avez pas renseigne le nom de la langue";
		REDIRECT("langues.php");
	}	
?>