<?php
session_start();
require('dinclude/verifs.php');
require('dinclude/hautdepage.php');
?>

    
        <h2>Informations Personnelles</h2>
 	<br />
<div class="scro">


<p>
Votre identifiant est : <?php echo $_SESSION['pseudo'] ?><br/>
Votre &#233;tablissement est : <?php echo $_SESSION['succursale']; ?><br/>
Votre rang est : <?php echo $_SESSION['rang']; ?><br/>
Votre nom est : <?php echo $_SESSION['nom']; ?></p>
	
	<h3><em>Vos r&#233;servations</em></h3>
	<?php
	
	
try{
	//connexion à la bdd
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 	$bdd = new PDO('mysql:host=localhost;dbname=alice', 'root', 'root', $pdo_options);
 	
	//on recupère les evenements auxquels est inscrit l'employee courant
	$reqxx = $bdd->prepare("SELECT event_theme,event_id FROM event,attendance WHERE attendance.id_event = event.event_id AND attendance.id_emp = :indexemp ");
	$reqxx->bindValue(":indexemp", $_SESSION['empid'], PDO::PARAM_INT);
	$reqxx->execute();
	$arrValues = $reqxx->fetchAll(PDO::FETCH_ASSOC);

	print "<table width=\"90%\">\n";
	// on affiche les donnees de arrValues
	foreach ($arrValues as $row){
    	print "<tr>";
    	foreach ($row as $key => $val){
        	print "<td>$val</td>";
    	}
    	// lien vers le détail de l'event 
    	print'<td><a href="inscrevent.php?evid='.$val.'">D&#233;tails</a></td>';
    	print "</tr>\n";
	}
	// fin tableau
	print "</table>\n";

	$reqxx->closeCursor();
	}
	catch (Exception $e){
    	die('Erreur : ' . $e->getMessage());
	}
?>



    	
</div>

</div> <!--fin milieu-->
 </div> <!--fin corps-->

</body>
</html>
