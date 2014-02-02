<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Administration');
?>
<!--liste des menus admin-->
<div>

<table id="FichesTable">
    <thead>
        <tr>
            <td>Langue maternelle</td>
            <td>Age</td>
            <td>Sexe</td>
            <td>Ville</td>
            <td>Profession</td>
            <td>Langue de perfectionnement</td>
            <td>Niveau</td>
            <td>Niveau (systeme europeen)</td>
        </tr>
    </thead>
    <tbody><?php
        $query=SQL("select * from UTILISATEUR u, FICHE f group by idFiche order by idFiche desc");
		while($row=$query->fetch_object())
		{
			echo '<tr style="background-color: lightgreen;">';
			echo '<td>'.$row->langueMaternelle.'</td>';
			echo '<td>'.$row->age.'</td>';
			if($row->civilite=='M.')
				echo '<td>M</td>';
			else
				echo '<td>F</td>';
			echo '<td>'.$row->ville.'</td>';
			echo '<td>'.$row->profession.'</td>';
			echo '<td>'.$row->languePerfectionnement.'</td>';
			echo '<td>'.$row->niveauLanguePerfectionnement.'</td>';
			echo '<td>'.$row->niveauLangueSysteme.'</td>';
			echo '</tr>';
		}
    ?></tbody>
</table>

</div>
<?php 
HTML_FOOTER();
?>
