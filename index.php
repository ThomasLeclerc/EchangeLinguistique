<?php
require_once 'include/engine.php';
HTML_HEADER('Accueil');
?>	
	<div id="presentation">
		<h3>Bienvenue sur le site d'inscription aux tandems linguistiques</h3>
		Ce site est une plateforme d'inscription au programme de tandems linguistiques organisé
		par le CeLab de l'Université de Franche-Comté.
		<br/>	<br/>
		Les tandems linguistiques sont destinés aux personnes souhaitant se perfectionner dans une langue par la pratique.
		<br/><br/>
		Pour s'inscrire, rien de plus simple. Il suffit de remplir le formulaire avec vos informations.
		<br/><br/>
		<div id="subscribe" class="bloc">
			<form action="./inscription.php">
				<input type="submit" value="Inscrivez vous !"/>
			</form>
		</div>
	</div>

		
<?php	
	HTML_FOOTER();
?>