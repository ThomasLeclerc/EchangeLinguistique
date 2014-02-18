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
					<?php 
						if(isset($_SESSION['id'])) { 
							$resultCountDemandes = SQL('Select count(*) as nbDemandes from FICHE where idLink is null');
							$resultCountLiens = SQL('Select count(*) as nbLiens from LINK');
							$resultCountTandems = SQL('Select count(*) div 2 as nbTandems from FICHE where idTandem is not null');
					?>
						<li><a href="<?=SHORT_RACINE?>admin/main.php">Demandes (<?=$resultCountDemandes->fetch_object()->nbDemandes?>)</a></li>
						<li><a href="<?=SHORT_RACINE?>admin/link.php">En attente (<?=$resultCountLiens->fetch_object()->nbLiens?>)</a></li>
						<li><a href="<?=SHORT_RACINE?>admin/tandems.php">Tandems (<?=$resultCountTandems->fetch_object()->nbTandems?>)</a></li>
						<div id="deconnexion" class="droite">
							<?=$_SESSION['nom']?>
							<a href="<?=SHORT_RACINE?>logout.php" title="Se déconnecter">Se deconnecter</a>
						</div>
					<?php }else { ?>		
						<li><a href="<?=SHORT_RACINE?>contact.php">Contact</a></li>
					<?php } ?>	
				</ul>
				
			</div>
			<div id="bandeau"><img id="img_bandeau" src="<?=SHORT_RACINE?>Ressources/Images/bandeau.png"/>

			</div>
			<h1><?=$titre?></h1>
		</div>
		
		<div id="content">
		
		
