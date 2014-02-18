<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Tandems');

//si un paramètre est donné à la page
//on traite la confirmation d'un tandem
if(isset($_GET['a']))
{
	//on recupere les id
	$idFiche1=$_GET['a'];
	$idFiche2=$_GET['b'];
	//on enregistre le tandem sur chaque fiche
	$queryUp1=SQL("update FICHE set idTandem=".$idFiche2." where idFiche=".$idFiche1);
	$queryUp2=SQL("update FICHE set idTandem=".$idFiche1." where idFiche=".$idFiche2);
	//on supprime le link puisque le tandem est lance
	if(!($queryDel1=SQL("delete from LINK where idFiche1=".$idFiche1." and idFiche2=".$idFiche2)))
		$queryDel2=SQL("delete from LINK where idFiche1=".$idFiche2." and idFiche2=".$idFiche1);
	//on supprime les idLink des fiches qui sont remplaces par les idTandem
	$queryUp3=SQL("update FICHE set idLink=null where idFiche=".$idFiche1);
	$queryUp4=SQL("update FICHE set idLink=null where idFiche=".$idFiche2);
}

//on utilise un tableau dans lequel
//on va mettre les id des fiches deja
//affichees pour ne pas le faire 2 fois
$fichesDejaAffichees = array();

//un compteur
$count = 0;

//on selectionne toutes les fiches qui ont un tandem
$queryTandems=SQL("select * from FICHE where idTandem is not null");
while($rowTandems=$queryTandems->fetch_object())
{
	//si la fiche a deja ete affichee on passe a la suivante
	if (!(in_array($rowTandems->idFiche, $fichesDejaAffichees)))
	{
		//on compte
		$count++;
		//on affiche un tableau a 2 lignes
		echo '<table id="tendemsTab'.$count.'">';
		echo '<tr>';
		echo '<td>'.$rowTandems->nomFiche.'</td>';
		echo '<td>'.$rowTandems->prenomFiche.'</td>';
		echo '<td>'.$rowTandems->age.'</td>';
		echo '<td>'.$rowTandems->sexe.'</td>';
		echo '<td>'.$rowTandems->profession.'</td>';
		echo '<td>'.$rowTandems->numeroTelephone.'</td>';
		echo '<td>'.$rowTandems->mail.'</td>';
		echo '</tr>';
		//on selectionne la fiche associee
		$queryT2=SQL("select * from FICHE where idFiche=".$rowTandems->idTandem);
		$rowT2=$queryT2->fetch_object();
		echo '<tr>';
		echo '<td>'.$rowT2->nomFiche.'</td>';
		echo '<td>'.$rowT2->prenomFiche.'</td>';
		echo '<td>'.$rowT2->age.'</td>';
		echo '<td>'.$rowT2->sexe.'</td>';
		echo '<td>'.$rowT2->profession.'</td>';
		echo '<td>'.$rowT2->numeroTelephone.'</td>';
		echo '<td>'.$rowT2->mail.'</td>';
		echo '<td><a href=""><input type="button" id="ButSuppTandem" /></a></td>';
		echo '</tr>';
		echo '</table>';
		echo '<br />';
		//on indique que ces fiches sont affichees
		$fichesDejaAffichees[] = $rowTandems->idFiche;
		$fichesDejaAffichees[] = $rowT2->idFiche;
		
	}
}

HTML_FOOTER();
?>