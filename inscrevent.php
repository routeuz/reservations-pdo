<?php
session_start();
require('dinclude/verifs.php');
require('dinclude/hautdepage.php');

?>
    
 
        <h2>D&#233;tails de l'&#233;v&#233;nement</h2>
 	<br />
	<div class="scro">

<?php
// Connexion à la base de données
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=alice', 'root', 'root', $pdo_options);
	
	
	
    // On récupère l'event dont l'id est passé en param
    $req = $bdd->prepare("SELECT * FROM alice.event WHERE (event_ajoutpar = :ajoutpar OR event_ajoutpar = 1) AND event_id = :index AND :now < event_date");
    $req->bindValue(":index", $_GET['evid'], PDO::PARAM_INT);
    $req->bindValue(":ajoutpar", $_SESSION['idelegate'], PDO::PARAM_INT);
    $req->bindValue(":now", time(), PDO::PARAM_INT);
    $req->execute();
    
    $nombredevents = $req->rowCount();
    
    // si la requete ne retourne rien
    if($nombredevents == 0){
    	echo "<p>Cet &#233;v&#233;nement n'existe pas, est termin&#233; ou ne concerne pas votre succursale.";
    	?>
    	<a href="listevent.php">Retour liste</a>
    	<?php
    }else{
    	//si la requete retourne un evenement, on enregistre son id dans la session
    	$_SESSION['evt_courrant'] = strip_tags($_GET['evid']);
    
    
    $donnees = $req->fetch()  
		?>
    	<h3>
    		<em><?php echo stripslashes($donnees['event_theme']); ?> <br />
    		pr&#233;sentation de <?php echo stripslashes($donnees['event_presentepar']); ?>
    		</em>
    	</h3>
        <p>
        	
            <?php 
            //on affiche la date en français
            setlocale (LC_TIME, 'fr_FR', 'fra');
             echo 'Le '.utf8_decode (strftime("%A %d %B %Y", htmlspecialchars($donnees['event_date'])).' de '.date('H:i', htmlspecialchars($donnees['event_date'])).' &agrave; '.date('H:i', htmlspecialchars($donnees['event_datefin']))); ?> GMT+1<br /> 
            
           Lieu : <?php 
           //stripslashes sert à retirer les "\" placés devant les apostrophes
           echo stripslashes($donnees['event_lieu']); ?> <br />
           <br/>
           <?php echo stripslashes($donnees['event_description']); ?><br/>
           <br />
           Cet &#233;v&#233;nement peut accueillir au maximum <?php echo $donnees['event_capacitemax']; ?> personnes
           et en compte pour l'instant <?php echo $donnees['event_remplissage']; ?>.<br/>
           
        
        <?php 
        //l'id de Alice est 1
        if($donnees['event_ajoutpar'] == 1){
        	echo 'Cet &#233;v&#233;nement est inter-succursale. ';
        }else{
        	echo 'Cet &#233;v&#233;nement concerne votre succursale uniquement. ';
        }
  
        ?>
        </p>
    
    <?php
    // Fin des infos sur l'event
    
    //pour la suite on vérifie si l'event est complet
    $estcomplet = $donnees['event_remplissage'] >= $donnees['event_capacitemax'];
    //echo var_dump($estcomplet);
    
    $req->closeCursor();
    
    if($nombredevents !=0){
    
    
    ?></p>
        
    <h3><em>Inscription/Desinscription</em></h3>
    
    
    <p>Vous etes actuellement 
    <?php
    //on tente de récuperer l'enregistrement de la presence de l'employee à cet event
    $req2 = $bdd->prepare("SELECT * FROM attendance WHERE id_event = :currentev AND id_emp = :currentemp ");
    $req2->bindValue(":currentev", $_SESSION['evt_courrant'], PDO::PARAM_INT);
    $req2->bindValue(":currentemp", $_SESSION['empid'], PDO::PARAM_INT);
    $req2->execute();
    
    $nb2resultats = $req2->rowCount();
    
    //si l'enregistrement n'existe pas alors l'employee n'est pas inscrit
    $estinscrite = $nb2resultats != 0;
    //echo var_dump($estinscrite);
    
    
     if($estinscrite){
    	echo 'dans';
    }else{
    	echo 'en dehors de';
    }?> la liste de pr&#233;sence.
    <?php
    if(!$estinscrite){
    	if(!$estcomplet){
    		echo 'Cet &#233;v&#233;nement est ouvert aux inscriptions.';
    		 ?>
    	<a href="inscrirev.php">Inscription</a>
    	<?php
    	}else{
    		echo 'Cet &#233;v&#233;nement est complet. Vous ne pouvez pas vous y inscrire.';
    	}
    }else{
    	//si l'employee est inscrit
    	echo 'Vous pouvez vous d&#233;sinscrire.'; 
    	?>
    	<a href="desinscrirev.php">D&#233;sinscription</a>
    	<?php
    	
    }?>
    
    <h3><em>Personnes inscrites</em></h3>
    <p>
    <?php
    //debut liste presence
    $req1 = $bdd->prepare("SELECT emp_nom, emp_succursale FROM employee e JOIN attendance a ON e.emp_id = a.id_emp WHERE a.id_event = :indexe ORDER BY emp_succursale ");
    $req1->bindValue(":indexe", $_SESSION['evt_courrant'], PDO::PARAM_INT);
    $req1->execute();
    
    $nombredinscrits = $req1->rowCount();
    
    // si la requete ne retourne rien
    
    if($nombredinscrits == 0){
    	echo "Personne n'est inscrit pour le moment.";
    	$estinscrite = false;
    	//echo var_dump($estinscrite);
    }else{
    
    	$prestab = $req1->fetchAll(PDO::FETCH_ASSOC);
    
    	print "<table>\n";
		//afficher les donnees de prestab
		foreach ($prestab as $row){
	    	print "<tr>";
	    	foreach ($row as $key => $val){
		        print "<td>$val</td>";
	    	}
	    	print "</tr>\n";
		}
		// close the table
		print "</table>\n";

    } //fin else sur nbdinscrits
    
    $req1->closeCursor();
    
    }//fin else 
    
        } //fin if $nombredevents != 0
?>
    </p>
    
    
    <?php

}
catch(Exception $e )
{
    die('Erreur : '.$e->getMessage());
}


?>

</div>

</div>
</div>

</body>
</html>
