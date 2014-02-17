<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="description" content=""/>
		<title><?=$titre?> - Dynamic Web Project - </title>
		<link rel="stylesheet" type="text/css" href="<?=SHORT_RACINE?>styles/style.css" />
		
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
		<script src="http://malsup.github.io/min/jquery.form.min.js"></script>

	</head>
	<body>
		<div id="header">
			<div id="bandeNoire">
				<ul id="bande_gauche">
					<li><a href="<?=SHORT_RACINE?>index.php">Accueil</a></li>
					<li><a href="<?=SHORT_RACINE?>admin/main.php">Gestion des tandems</a></li>
					<li><a href="<?=SHORT_RACINE?>admin/link.php">liens</a></li>
				</ul>

			</div>
			<div id="bandeau"><img id="img_bandeau" src="<?=SHORT_RACINE?>Ressources/Images/bandeau.png"/>

			</div>
			<h1><?=$titre?></h1>
			<?php if(isset($_SESSION['id'])) { ?>
				<div id="deconnexion" class="droite">
					<h3><?=$_SESSION['nom']?></h3>
					<a href="<?=SHORT_RACINE?>logout.php" title="Se déconnecter">Se deconnecter</a>
				</div>
			
			<?php } ?>	


		</div>
		
		<div id="content">
		
		
