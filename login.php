<?php
require_once 'include/engine.php';
HTML_HEADER('Connexion');

// Vérification de la connexion
if(isset($_POST['login'],$_POST['password']))
{
	$requete=SQL("  SELECT * 
                        FROM UTILISATEUR
                        WHERE UTILISATEUR.loginUtilisateur='".$_POST['login']."'
                        AND password='".hash("sha1",$_POST['password'])."'   ");
	if($requete->num_rows == 1)
	{
		// Compte autorisé
		$compte=$requete->fetch_object();
		$_SESSION['id']=$compte->idUtilisateur;
		$_SESSION['nom']=$compte->nomUtilisateur." ".$compte->prenomUtilisateur;
                
		//MessagesService::ajouter(MessagesService::OK, "Bienvenue ".$compte->prenomUtilisateur." ".$compte->nomUtilisateur);
		REDIRECT('profil.php');
	}
	else
		MessagesService::ajouter(MessagesService::ERREUR, "Les identifiants et le mot de passe ne se correspondent pas");
}

?>
<div id="forms_login">
	<div id="login">
		<form action="" method="POST">
			<fieldset>
				<legend>Connexion</legend>
		
				<table>
					<tr>
						<td><label for="login">Votre identifiant</label></td>
						<td><input name="login" value="<?=defaultPost('login')?>"/></td>
					</tr>
					<tr>
						<td><label for="password">Votre mot de passe</label></td>
						<td><input type="password" name="password" value=""/></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Valider" />
			</fieldset>
		</form>
	</div><div id="subscribe">
		<a href="formulaireInsciption.php">S'inscrire</a>
	</div>
</div>

<?php 
HTML_FOOTER();
?>
