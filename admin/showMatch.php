<?php
    require_once("../include/engine.php");

	$idFiche1 = $_POST["id"];

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
						and idLink is null
						and idTandem is null
						group by idFiche
					");
	$nbMatch=$queryMatch->num_rows;
	// on affiche les fleches de navigations uniquement s'il y a plusieurs matchs trouves

	if($nbMatch>0)
	{
		echo '<div id="numMatch" class="dev" style="width:25px;">1</div>';
	}

	//pour chaque match trouve
	$i=0;
	while($rowMatch=$queryMatch->fetch_object())
	{
		$i++;
		$idFiche=$rowMatch->idFiche;
		

		//au 1er resultat on ouvre une div
		if($fs==0)
		{
			if($nbMatch==1)
				echo '<div class="ficheParticipant"><div id="leg"><h5>1 fiche correspond</h5></div>';
			else
				echo '<div class="ficheParticipant">
							<div id="leg">
								<table id="navigationMatch">
									<tr>
										<td><input type="button" id="butAv" value="<" /></td>
										<td><h5>1 / '.$nbMatch.'</h5></td>
										<td><input id="butAp" type="button" value=">" /></td>
									</tr>
								</table>
							</div>';
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
	//si une div a ete ouvert, on le ferme
	if($fs==1){
		echo '</div>';
		echo '<input id="butMatch" type="button" value="Associer" />';
		$fs=2;
	}
	echo '<div id="nbMatch" style="visibility:hidden;">'.$nbMatch.'</div>';

?>
