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
	echo '<div id="link'.$count.'">';
	echo '<table class="tableLink">';
		echo '<thead><tr>';
			echo '<td>Lien no '.$count.'</td>';
			echo '<td>';
				echo '<form method="POST" onsubmit="return confirm(\'Etes vous sur de vouloir supprimer ce lien?\');" action="linkRequest.php?del=1">';
					echo '<input name="id1" type="hidden" value="'.$rowLink->idFiche1.'"/>';
					echo '<input name="id2" type="hidden" value="'.$rowLink->idFiche2.'"/>';
					echo '<input style="float:right;" type="submit" value="Supprimer le lien"/>';
				echo '</form>';
			echo '</td>';
		echo '</tr></thead>';
		echo '<tbody><tr>';
			echo '<td class="tdLink">';
				$idFiche=$rowLink->idFiche1;
				require("../admin/showFiche.php");
			echo '</td>';
			echo '<td class="tdLink">';
				$idFiche=$rowLink->idFiche2;
				require("../admin/showFiche.php");
			echo '</td>';
		echo '</tr></tbody>';
	echo '</table></div>';
	echo'<br/>';
}


HTML_FOOTER();
?>
