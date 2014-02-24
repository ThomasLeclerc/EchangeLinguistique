<?php
    require_once("../include/engine.php");
	// Si non connecté
	if(!isset($_SESSION['id'])) 
		REDIRECT('../login.php');
		
	$idFiche1 = $_POST["id1"];
	$idFiche2 = $_POST["id2"];
	$resultEmail = SQL('SELECT f1.mail as mail1, f2.mail as mail2 from FICHE f1, FICHE f2 where f1.idFiche='.$idFiche1.' and f2.idFiche='.$idFiche2);
	$objResultEmail = $resultEmail->fetch_object();
	$mail1 = $objResultEmail->mail1;
	$mail2 = $objResultEmail->mail2;
	if($_POST['del']=="true")
	{	
		$queryDel=SQL("delete from FICHE where idFiche=".$idFiche1);
		$queryDel2=SQL("delete from FICHE where idFiche=".$idFiche2);
		if($queryDel1){
			$sujet = 'Tandems Linguistique : Suppression de votre inscription';
			$msg = 'Bonjour, <br/>
			Nous tenons à vous informer que votre inscription au programme d\'échanges linguistiques a été supprimée.
			Si vous le souhaitez vous pouvez vous ré-inscrire sur le site.
			<br/>Cordialement,<br/><br/>
			'.$_SESSION['nom'];
			sendEmail($_SESSION['email'], $mail1, $sujet, $msg);
		}
		if($queryDel2){
			$sujet = 'Tandems Linguistique : Suppression de votre inscription';
			$msg = 'Bonjour, <br/>
			Nous tenons à vous informer que votre inscription au programme d\'échanges linguistiques a été supprimée.
			Si vous le souhaitez vous pouvez vous ré-inscrire sur le site.
			<br/>Cordialement,<br/><br/>
			'.$_SESSION['nom'];
			sendEmail($_SESSION['email'], $mail2, $sujet, $msg);
		}
	}
	else
	{
		$query2=SQL("UPDATE FICHE SET idTandem=null WHERE idFiche=".$idFiche1);
		$query3=SQL("UPDATE FICHE SET idTandem=null WHERE idFiche=".$idFiche2);
		$sujet = 'Tandems Linguistique : Suppression de votre inscription';
		$msg = 'Bonjour, <br/>
		 Votre tandem linguistique a été annulé. Vous pouvez contactez le gestionnaire pour plus d\'informations.
		<br/>Cordialement,<br/><br/>
		'.$_SESSION['nom'];
		
		sendEmail($_SESSION['email'], $mail1, $sujet, $msg);
		sendEmail($_SESSION['email'], $mail2, $sujet, $msg);
	}

?>