<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Profil');

if(isset($_GET['error']))
	echo '<fieldset>Erreur lors de la modification du mot de passe!<br /> Modification annulée!</fieldset>';
?>

<form id="profileForm" method="POST" action="profileRequest.php">

<?php
$query=SQL("select * from UTILISATEUR where idUtilisateur=".$_SESSION['id']);
$row=$query->fetch_object();
echo '<table>';
echo '<tr><td><label>Nom : </label></td><td><input type="text" name="nomProfil" value="'.$row->nomUtilisateur.'" /></td></tr>';
echo '<tr><td><label>Prenom : </label></td><td><input type="text" name="prenomProfil" value="'.$row->prenomUtilisateur.'" /></td></tr>';
echo '<tr><td><label>Login : </label></td><td><input type="text" name="loginProfil" value="'.$row->loginUtilisateur.'" /></td></tr>';
echo '<tr><td><label>Mot de passe : </label></td><td><input type="password" name="mdpProfil" /></td></tr>';
echo '<tr><td><label>Nouveau mot de passe : </label></td><td><input type="password" name="newMdpProfil" /></td></tr>';
echo '<tr><td><label>Confirmation nouveau mdp : </label></td><td><input type="password" name="newMdpProfil2" /></td></tr>';
echo '<tr><td><input type="submit" value="Modifier"/></td></tr>';
?>

</form>




<?php
HTML_FOOTER();
?>