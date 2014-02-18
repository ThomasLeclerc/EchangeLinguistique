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
                
		REDIRECT('admin/main.php');
	}
	else
		echo '<div class="msg_1">Login ou mot de passe incorrect</div>';
}

?>

		<div id="login">
			<form action="" method="POST">
				<legend><b>Connexion</b></legend>	
				<br/>
				<table>
					<tr>
						<td><label for="login">Login</label></td>
						<td><input name="login" value="<?=defaultPost('login')?>"/></td>
					</tr>
					<tr>
						<td><label for="password">Mot de passe</label></td>
						<td><input type="password" name="password" value=""/></td>
					</tr>
				</table><br/>
				<input type="submit" name="submit" value="Valider" class="validate"/>
			</form>
		
	</div>

<?php 
HTML_FOOTER();
?>
