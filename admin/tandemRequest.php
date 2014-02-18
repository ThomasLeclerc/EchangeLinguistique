<?php
    require_once("../include/engine.php");
	// Si non connecté
	if(!isset($_SESSION['id'])) 
		REDIRECT('../login.php');
		
	$idFiche1 = $_POST["id1"];
	$idFiche2 = $_POST["id2"];
	if($_POST['del']=="true")
	{
		$queryDel=SQL("delete from FICHE where idFiche=".$idFiche1);
		$queryDel2=SQL("delete from FICHE where idFiche=".$idFiche2);
	}
	else
	{
		$query2=SQL("UPDATE FICHE SET idTandem=null WHERE idFiche=".$idFiche1);
		$query3=SQL("UPDATE FICHE SET idTandem=null WHERE idFiche=".$idFiche2);
	}

?>