<?php
    require_once("../include/engine.php");
	// Si non connecté
	if(!isset($_SESSION['id'])) 
		REDIRECT('../login.php');

	$idFiche = $_POST["num"];
	$query=SQL("delete from FICHE where idFiche=".$idFiche);
?>