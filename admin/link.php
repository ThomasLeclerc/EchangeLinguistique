<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Gestion des liens');

$queryLink = SQL("Select * from LINK");

$count=0;
while($rowLink=$queryLink->fetch_object())
{
/*	$queryFiche1 = SQL("Select * from FICHE where idFiche=".$rowLink->idFiche1);
	$queryFiche2 = SQL("Select * from FICHE where idFiche=".$rowLink->idFiche2);
	$rowFiche1=$queryFiche1->fetch_object();
	$rowFiche2=$queryFiche2->fetch_object();
*/	
	$count++;
	echo '<div id="link'.$count.'" class="ficheTandem">
					Lien no '.$count.'
					<form method="POST" onsubmit="return confirm(\'Etes vous sur de vouloir supprimer ce lien?\');" action="linkRequest.php?del=1">
						<input name="id1" type="hidden" value="'.$rowLink->idFiche1.'"/>
						<input name="id2" type="hidden" value="'.$rowLink->idFiche2.'"/>
						<input style="float:right;" type="submit" value="Supprimer le lien"/>
				</form><br/>';
	echo '<div class="ficheTandemSeparee">';
				$idFiche=$rowLink->idFiche1;
				require("../admin/showFiche.php");
	echo '</div><div class="ficheTandemSeparee">';
				$idFiche=$rowLink->idFiche2;
				require("../admin/showFiche.php");
	echo '/div><div class="clear"></div>';
	echo'<br/>';
}



HTML_FOOTER();
?>
