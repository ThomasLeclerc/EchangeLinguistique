<?php
	require_once 'engine.php';
	
	$result = SQL("SELECT * FROM FICHE WHERE mail='".$_POST['email']."'");
	$fiches = $result->fetch_array();
	if(count($fiches)!=0){
		echo "1";
	}else{
		echo "0";
	}

?>