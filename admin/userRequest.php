<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');



$idUtilisateur=$_SESSION['id'];
// Récup des données du formulaire
$nomUtilisateur=$_POST['nomUser'];
$prenomUtilisateur=$_POST['prenomUser'];
$loginUtilisateur=$_POST['loginUser'];
$emailUtilisateur=$_POST['emailUser'];
$mdpUtilisateur1=$_POST['pass1User'];
$mdpUtilisateur2=$_POST['pass2User'];
if(isset($_POST['recoitEmail']))
	$mail="true";
else
	$mail="false";
if($mdpUtilisateur1==$mdpUtilisateur2)
	$query=SQL("insert into UTILISATEUR values(	null,
											'".$nomUtilisateur."',
											'".$prenomUtilisateur."',
											'".$loginUtilisateur."',
											'".hash("sha1",$mdpUtilisateur1)."',
											'".$emailUtilisateur."',
											".$mail.")");
REDIRECT('user.php');
?>