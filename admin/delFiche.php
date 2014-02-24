<?php
    require_once("../include/engine.php");
	// Si non connecté
	if(!isset($_SESSION['id'])) 
		REDIRECT('../login.php');
		
		
	$idFiche = $_POST["num"];
	$resultEmail = SQL('SELECT mail from FICHE where idFiche='.$idFiche);
	$objResultEmail = $resultEmail->fetch_object();
	$mail = $objResultEmail->mail;
	
	
	$query=SQL("delete from FICHE where idFiche=".$idFiche);
	if($query){
		$sujet = 'Tandems Linguistique : Suppression de votre inscription';
		$msg = 'Bonjour, <br/>
		Nous tenons à vous informer que votre inscription au programme d\'échanges linguistiques a été supprimée.
		Si vous le souhaitez vous pouvez vous ré-inscrire sur le site.
		<br/>Cordialement,<br/><br/>
		'.$_SESSION['nom'];
		sendEmail($_SESSION['email'], $mail, $sujet, $msg);
	}
?>