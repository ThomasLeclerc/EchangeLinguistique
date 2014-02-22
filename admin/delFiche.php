<?php
    require_once("../include/engine.php");
	// Si non connecté
	if(!isset($_SESSION['id'])) 
		REDIRECT('../login.php');
	$idFiche = $_POST["num"];
	$resultEmail = ('SELECT mail from FICHE where idFiche='.$idFiche);
	$mail = $resultEmail->fetch_object()->mail;
	
	
	$query=SQL("delete from FICHE where idFiche=".$idFiche);
?>