<?php
// Moteur + vérif des droits
require_once '../include/engine.php';
// Si non connecté
if(!isset($_SESSION['id'])) 
    REDIRECT('../login.php');
// Entete
HTML_HEADER('Gestion des liens');
?>
<script>
function showFiche(id){


	//selectLine(id);
	 var resp;
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
           resp = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","showFiche.php?id="+id,true);
    xmlhttp.send();
    return resp;

}
	function showLink(id1, id2, idDivLink){
		var html = '<div id="link'+idDivLink+'" class="ficheTandem">'+
						'Lien n° '+idDivLink;
								
		$.post(	'showFiche.php',
			{ id: id1}, 
			function(returnedData){
					html += '<div class="ficheTandemSeparee">';
					html += 			returnedData;
					$.post(	'showFiche.php',
						{ id: id2}, 
						function(returnedData2){
							html += '<div class="ficheTandemSeparee">';
							html += 			returnedData2;
							html += '</div><div class="clear"></div>';
							html += '<a href="tandems.php?a='+id1+'&b='+id1+'"><input type="button" class="validate" value="Valider ce tandem"</a>';
							html += '<form method="POST" onsubmit="return confirm(\'Etes vous sur de vouloir supprimer ce lien?\');"  action="linkRequest.php?del=1">'+
										'	<input name="id1" type="hidden" value="'+id1+'"/>'+
										'	<input name="id2" type="hidden" value="'+id2+'"/>'+
										'	<input style="float:right;" type="submit" value="Supprimer le lien" class="cancel"/>'+
										'</form></div>';
							$('#link').html(html);
					});
		});
		

	}


</script>

<div class="divFichesTable" id="listeTandems">
	<table class="FichesTable">
	    <thead>
	        <tr>
	            <td>Binômes</td>
	        </tr>
	    </thead>
	    <tbody>
	    <?php
	    	$resultListLiens = SQL('SELECT f1.nomFiche as nom1, f1.idFiche as idFiche1, f2.idFiche as idFiche2, f2.nomFiche as nom2 from FICHE f1, FICHE f2, LINK l where f1.idFiche=l.idFiche1 and f2.idFiche=l.idFiche2');
			$count=0;	     
	      while($ligneLien=$resultListLiens->fetch_object()){
	      	$count++;
	      	echo '<tr class="ligneLien" id="lien'.$count.'" onclick="showLink('.$ligneLien->idFiche1.', '.$ligneLien->idFiche2.', '.$count.');">
	      				<td> '.$ligneLien->nom1.' - '.$ligneLien->nom2.' </td>
	      			</tr>';
	      }
	    ?>	    
	    </tbody>
	</table>
</div>
<div id="link"></div>
<div class="clear"></div>
<?php




HTML_FOOTER();
?>
