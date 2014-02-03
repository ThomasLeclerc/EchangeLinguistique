<?php
    require_once("../include/engine.php");
	$idFiche1 = $_GET["id"];

	$queryLangue = SQL("select * from fiche where idFiche=".$idFiche1);
	$rowLangue=$queryLangue->fetch_object();
	$queryNbMatch = SQL("	select * 
							from FICHE 
							where idLangueMaternelle=".$rowLangue->idLanguePerfectionnement."
							and idLanguePerfectionnement=".$rowLangue->idLangueMaternelle);
	$i = 0;
	while($rowNbMatch=$queryNbMatch->fetch_object())
	{
		$i++;
		$idFiche=$rowNbMatch->idFiche;
		require("../admin/showFiche.php");//?id=".$rowNbMatch->idFiche);
		echo '</div>';
	}
	echo '<legend>'.$i.' personne(s) correspond(ent)</legend>';

?>