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
		REDIRECT('admin/main.php');
	}
	else
		MessagesService::ajouter(MessagesService::ERREUR, "Les identifiants et le mot de passe ne se correspondent pas");
}

?>
<div id="content">
	<div id="forms_login">
		<div id="login" class="bloc">
			<form action="" method="POST">
				<legend><b>Connexion</b></legend>	
				<table>
					<tr>
						<td><label for="login">Login</label></td>
						<td><input name="login" value="<?=defaultPost('login')?>"/></td>
					</tr>
					<tr>
						<td><label for="password">Mot de passe</label></td>
						<td><input type="password" name="password" value=""/></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Valider" class="validate"/>
			</form>
		
	</div>
</content>
<?php 
HTML_FOOTER();
?>
