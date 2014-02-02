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
            <td>Langue de perfectionnement</td>
            <td>Niveau</td>
            <td>Niveau (systeme europeen)</td>
            <td>Age</td>
            <td>Sexe</td>
            <td>Ville</td>
            <td>Profession</td>
        </tr>
    </thead>
    <tbody><?php
        $query=SQL("select * from UTILISATEUR u, FICHE f group by idFiche order by idFiche desc");
		while($row=$query->fetch_object())
		{
			$queryLangueMat=SQL("select * from LANGUE where idLangue=".$row->idLangueMaternelle);
			$rowLangueMat=$queryLangueMat->fetch_object();
			$queryLanguePerf=SQL("select * from LANGUE where idLangue=".$row->idLanguePerfectionnement);
			$rowLanguePerf=$queryLanguePerf->fetch_object();
			
			echo '<tr style="background-color: lightgreen;">';
			echo '<td>'.$rowLangueMat->libelleLangue.'</td>';
			echo '<td>'.$rowLanguePerf->libelleLangue.'</td>';
			echo '<td>'.$row->niveauLanguePerfectionnement.'</td>';
			echo '<td>'.$row->niveauLangueSysteme.'</td>';
			echo '<td>'.$row->age.'</td>';
			echo '<td>'.$row->sexe.'</td>';
			echo '<td>'.$row->ville.'</td>';
			echo '<td>'.$row->profession.'</td>';
			echo '</tr>';
		}
    ?></tbody>
</table>

</div>
<?php 
HTML_FOOTER();
?>
