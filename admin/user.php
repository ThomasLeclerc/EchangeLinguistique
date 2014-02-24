<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Ajouter un utilisateur');
?>

<form id="userForm" method="POST" action="userRequest.php">
<table>
<tr><td><label>Nom : </label></td><td><input type="text" name="nomUser" required/></td></tr>
<tr><td><label>Prenom : </label></td><td><input type="text" name="prenomUser" required/></td></tr>
<tr><td><label>Login : </label></td><td><input type="text" name="loginUser" required/></td></tr>
<tr><td><label>E-mail : </label></td><td><input type="text" name="emailUser" required/></td></tr>
<tr><td><label>Recoit emails du site : </label></td><td><input type="checkbox" name="recoitEmail" /></td></tr>
<tr><td><label>Mot de passe : </label></td><td><input type="password" id="pass1User" name="pass1User" required autocomplete="off" value=""/></td></tr>
<tr><td><label>Confirmer mdp : </label></td><td><input type="password" id="pass2User" name="pass2User" required/></td></tr>
</table>
<input type="submit" value="Ajouter" />
</form>
<?php
HTML_FOOTER();
?>
