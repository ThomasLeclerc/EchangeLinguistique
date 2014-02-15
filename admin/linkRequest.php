<?php
    require_once("../include/engine.php");
	$idFiche1 = $_POST["id1"];
	$idFiche2 = $_POST["id2"];
	if(isset($_GET['del']))
	{
		$query=SQL("delete from LINK where idFiche1=".$idFiche1." and idFiche2=".$idFiche2);
		$query2=SQL("UPDATE FICHE SET idLink=null WHERE idFiche=".$idFiche1);
		$query3=SQL("UPDATE FICHE SET idLink=null WHERE idFiche=".$idFiche2);
		REDIRECT('link.php');
	}
	else
	{
		$query=SQL("insert into LINK values (".$idFiche1.", ".$idFiche2.")");
		$query2=SQL("UPDATE FICHE SET idLink=".$idFiche2." where idFiche=".$idFiche1);
		$query3=SQL("UPDATE FICHE SET idLink=".$idFiche1." where idFiche=".$idFiche2);

		REDIRECT('main.php');
	}
?>