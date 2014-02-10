<?php
    require_once("../include/engine.php");

	$idFiche1 = $_GET["id"];

	$nbMatch=0;
	$fs=0;

	$queryMatch=SQL("	select f.idFiche
						from FICHE f, PARLE pa, PERFECTIONNE pe
						where pe.idLangue in (
							select idLangue
							from PARLE where idFiche=".$idFiche1."
							)
						and f.idFiche=pe.idFiche
						and pa.idLangue in (
							select idLangue from PERFECTIONNE
							where idFiche=".$idFiche1."
							)
						and f.idFiche=pa.idFiche						
					");
	/* ****
		Requete pour le nombre de correspondances trouvees
													****** */
	$queryNbMatch=SQL("	select count(*) as nb
						from FICHE f, PARLE pa, PERFECTIONNE pe
						where pe.idLangue in (
							select idLangue
							from PARLE where idFiche=".$idFiche1."
							)
						and f.idFiche=pe.idFiche
						and pa.idLangue in (
							select idLangue from PERFECTIONNE
							where idFiche=".$idFiche1."
							)
						and f.idFiche=pa.idFiche						
					");
	$rowNbMatch=$queryNbMatch->fetch_object();
	$nbMatch=$rowNbMatch->nb;
	// on affiche les fleches de navigations uniquement s'il y a plusieurs matchs trouves
	if($nbMatch>1)
	{
/*		echo '<table id="navigationMatch"><tr>';
		echo '<td><input id="butAv" type="button" value="<" style="width:25px;"/></td>';
		echo '<td><div id="numMatch" style="width:25px;">1</div></td>';
		echo '<td><input id="butAp" type="button" value=">" style="width:25px;"/></td>';
		echo '</tr></table>';
*/		echo '<div id="numMatch" class="dev" style="width:25px;">1</div>';
	}

	//pour chaque match trouve
	$i=0;
	while($rowMatch=$queryMatch->fetch_object())
	{
		$i++;
		$idFiche=$rowMatch->idFiche;
		

		//au 1er resultat on ouvre un fieldset
		if($fs==0)
		{
			if($nbMatch==1)
				echo '<fieldset><legend id="leg"><h5>1 fiche correspond</h5></legend>';
			else
				echo '<fieldset><legend id="leg"><table id="navigationMatch"><tr><td><input type="button" id="butAv" value="<" /></td><td><h5>1 / '.$nbMatch.'</h5></td><td><input id="butAp" type="button" value=">" /></td></tr></table></legend>';
			$fs=1;
			$m=1;
		}

		if($i>1)
			echo '<div id="match'.$idFiche.'" class="match'.$i.'" style="display:none;">';
		else
		{
			echo '<div id="match'.$idFiche.'" class="match'.$i.'">';
			$idFiche2=$idFiche;
		}
		require("../admin/showFiche.php");
		echo '<div class="dev" id="champID'.$i.'">'.$i.'</div>';
		echo '</div>';
	}
	//si un fieldset a ete ouvert, on le ferme
	if($fs==1){
		echo '</fieldset>';
		echo '<input id="butMatch" type="button" value="Associer" />';
	}
	echo '<div id="nbMatch" style="visibility:hidden;">'.$nbMatch.'</div>';

?>
