<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Gestion des liens');
?>
	<div id="divFichesTable">
	
	
	</div>
<?php
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
	echo '<div class="clear"></div></div>';
	echo'<br/>';
}

/*<div id="divFichesTable">
<table id="FichesTable">
    <thead>
        <tr>
            <td>Langue maternelle</td>
            <td>Langue de <br/>perfectionnement (Niveau) </td>
            <td>Age</td>
            <td>Sexe</td>
        </tr>
    </thead>
    <tbody><tr id="trLangue1" onclick="showFiche(1)" ><td><table id="ligneLangue1" class="ligneF"><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/france.png"/> Francais</td></tr></tr></table></td><td><table id="ligne2Langue1" class="ligneF" ><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/royaume-uni.png"/> Anglais (Debutant - A1)</td></tr></tr></table></td><td id="ligneAge1" class="ligneF">22</td><td id="ligneSexe1" class="ligneF">M</td></tr><tr id="trLangue2" onclick="showFiche(2)" ><td><table id="ligneLangue2" class="ligneF"><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/france.png"/> Francais</td></tr></tr></table></td><td><table id="ligne2Langue2" class="ligneF" ><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/italie.png"/> Italien (Intermediaire - B2)</td></tr></tr></table></td><td id="ligneAge2" class="ligneF">25</td><td id="ligneSexe2" class="ligneF">M</td></tr><tr id="trLangue3" onclick="showFiche(3)" ><td><table id="ligneLangue3" class="ligneF"><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/royaume-uni.png"/> Anglais</td></tr></tr></table></td><td><table id="ligne2Langue3" class="ligneF" ><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/france.png"/> Francais (Avance)</td></tr></tr></table></td><td id="ligneAge3" class="ligneF">87</td><td id="ligneSexe3" class="ligneF">M</td></tr><tr id="trLangue4" onclick="showFiche(4)" ><td><table id="ligneLangue4" class="ligneF"><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/royaume-uni.png"/> Anglais</td></tr></tr></table></td><td><table id="ligne2Langue4" class="ligneF" ><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/france.png"/> Francais (Intermediaire)</td></tr></tr></table></td><td id="ligneAge4" class="ligneF">18</td><td id="ligneSexe4" class="ligneF">M</td></tr><tr id="trLangue5" onclick="showFiche(5)" ><td><table id="ligneLangue5" class="ligneF"><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/royaume-uni.png"/> Anglais</td></tr></tr></table></td><td><table id="ligne2Langue5" class="ligneF" ><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/france.png"/> Francais (Intermediaire)</td></tr><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/espagne.png"/> Espagnol (Avance - A2)</td></tr></tr></table></td><td id="ligneAge5" class="ligneF">23</td><td id="ligneSexe5" class="ligneF">M</td></tr><tr id="trLangue8" onclick="showFiche(8)" ><td><table id="ligneLangue8" class="ligneF"><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/france.png"/> Francais</td></tr></tr></table></td><td><table id="ligne2Langue8" class="ligneF" ><tr><td><img class="flag" src="/EchangeLinguistique/styles/flags/allemagne.png"/> Allemand (Debutant)</td></tr></tr></table></td><td id="ligneAge8" class="ligneF">38</td><td id="ligneSexe8" class="ligneF">M</td></tr></tbody>
</table>
</div>*/

HTML_FOOTER();
?>
