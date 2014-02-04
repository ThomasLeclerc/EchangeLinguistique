<?php
    require_once("../include/engine.php");
	$idFiche1 = $_GET["id"];

	$nbMatch=0;

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
		while($rowMatch=$queryMatch->fetch_object())
		{
			$nbMatch++;
			$idFiche=$rowMatch->idFiche;
			echo '<div>';
			require("../admin/showFiche.php");
			echo '</div>';
		}

	echo '<legend><h5>'.$nbMatch.' personne(s) correspond(ent)</h5></legend>';

?>