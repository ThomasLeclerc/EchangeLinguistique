<?php
    require_once("../include/engine.php");
	// Si non connecté
	if(!isset($_SESSION['id'])) 
		REDIRECT('../login.php');
		
	$idFiche = 13;//$_POST["num"];
	$resultEmail = ('SELECT mail from FICHE where idFiche='.$idFiche);
	$mail = ($resultEmail->fetch_object())->mail;
	
	
	$query=SQL("delete from FICHE where idFiche=".$idFiche);
	if($query){
		$sujet = 'Tandems Linguistique : Suppression de votre inscription';
		$msg = 'Bonjour, <br/>
		\t Nous tenons à vous informer que votre inscription au programme d\'échanges linguistiques a été supprimée.
		Si vous le souhaitez vous pouvez vous ré-inscrire sur le site.
		Cordialement,<br/>
		'.$_SESSION['nom'];
		sendEmail($_SESSION['email'], $mail, $sujet, $msg);
	}
?>