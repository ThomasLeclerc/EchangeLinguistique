<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');

//Si on appelle la page pour une suppression de compte
if(isset($_GET['supprId']))
{
		$querySuppr=SQL("delete from UTILISATEUR where idUtilisateur=".$_GET['supprId']);
		REDIRECT('../logout.php');
}
//Sinon
else
{
	$idUtilisateur=$_SESSION['id'];
	// Récup des données du formulaire
	$nomUtilisateur=$_POST['nomProfil'];
	$prenomUtilisateur=$_POST['prenomProfil'];
	$loginUtilisateur=$_POST['loginProfil'];
	$emailUtilisateur=$_POST['emailProfil'];
	$mdpUtilisateur=$_POST['mdpProfil'];
	$mdpUtilisateur1=$_POST['newMdpProfil'];
	$mdpUtilisateur2=$_POST['newMdpProfil2'];
	if(isset($_POST['recoitEmail']))
		$mail="true";
	else
		$mail="false";
	// Si changement de mdp
	if($mdpUtilisateur1!="")
	{
		$queryMdp=SQL("select password from UTILISATEUR where idUtilisateur=".$idUtilisateur);
		$rowMdp=$queryMdp->fetch_object();
		$mdpBase=$rowMdp->password;
		// On vérifie que les deux mdp taper 
		// sont les mêmes(au cas ou javascript desactivé)
		if($mdpUtilisateur1==$mdpUtilisateur2 && hash("sha512",$mdpUtilisateur)==$mdpBase)
			// Requete de la mise à jour
			$query_modif=SQL
			("  
				UPDATE UTILISATEUR 
				SET nomUtilisateur='".$nomUtilisateur."',
					prenomUtilisateur='".$prenomUtilisateur."',
					loginUtilisateur='".$loginUtilisateur."',
					emailUtilisateur='".$emailUtilisateur."',
					recoitEmail=".$mail.",
					password='".hash("sha512",$mdpUtilisateur1)."'
				WHERE idUtilisateur=".$idUtilisateur
			);
		// Si les mdp sont differents
		else
		{
			// Redirection
			REDIRECT('profil.php?error=1');
		}
	}      
	// Si pas de changement de mdp
	else
	{
		// Requete de la mise à jour
		$query_modif=SQL
		("
			UPDATE UTILISATEUR
			SET nomUtilisateur='".$nomUtilisateur."',
				prenomUtilisateur='".$prenomUtilisateur."',
				loginUtilisateur='".$loginUtilisateur."',
				recoitEmail=".$mail.",
				emailUtilisateur='".$emailUtilisateur."'
			WHERE idUtilisateur=".$idUtilisateur
		);
	}
	REDIRECT('Profil.php');
}


?>