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
echo '<tr><td><label>Login : </label></td><td><input type="text" name="loginProfil" required value="'.$row->loginUtilisateur.'" /></td></tr>';
echo '<tr><td><label>E-mail : </label></td><td><input type="email" name="emailProfil" required value="'.$row->emailUtilisateur.'" /></td></tr>';
if($row->recoitEmail)
	echo '<tr><td><label>Recevoir les emails du site : </label></td><td><input type="checkbox" name="recoitEmail" checked="checked"/></td></tr>';
else
	echo '<tr><td><label>Recevoir les emails du site : </label></td><td><input type="checkbox" name="recoitEmail"/></td></tr>';
echo '<tr><td><label>Mot de passe : </label></td><td><input type="password" name="mdpProfil" required autocomplete="off" value=""/></td></tr>';
echo '<tr><td><label>Nouveau mot de passe : </label></td><td><input type="password" name="newMdpProfil" /></td></tr>';
echo '<tr><td><label>Confirmation nouveau mdp : </label></td><td><input type="password" name="newMdpProfil2" /></td></tr>';
echo '<tr><td><input type="submit" value="Modifier"/></td></tr>';
echo '</table></form><a href="profileRequest.php?supprId='.$row->idUtilisateur.'" onclick="return confirm(\'Etes-vous sur de vouloir supprimer ce compte ?\')">Supprimer le compte définitivement</a>';








HTML_FOOTER();
?>