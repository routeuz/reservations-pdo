<?php
session_start();
require('dinclude/verifs.php');
require('dinclude/hautdepage.php');
?>

    
 
        <h2>Liste des prochains &#233;v&#233;nements</h2>
 	<br />
<div class="scro">
<?php
try
{
	// Connexion à la bdd
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=alice', 'root', 'root', $pdo_options);
	
	
    // On récupère les events dont la date n'est pas passée crees par idelegate
    $req = $bdd->prepare("SELECT * FROM alice.event WHERE (event_ajoutpar = :ajoutpar or event_ajoutpar = 1) AND :now < event_date ORDER BY event_date DESC");
    $req->bindValue(":ajoutpar", $_SESSION['idelegate'], PDO::PARAM_INT);
    $req->bindValue(":now", time(), PDO::PARAM_INT);
    $req->execute();
    
    $nombredevents = $req->rowCount();
    
    // si la requete ne retourne rien
    if($nombredevents == 0){
    	echo "Pas d'&#233;v&#233;nement pr&#233;vu.";
    	?>
    	<a href="listevent.php">Retour liste</a>
    	<?php
    }

    // On affiche sur une ligne les infos principales
    while ($donnees = $req->fetch())
    {
    ?>
    <div class="evt">
        <p>
            <?php  echo 'Le '.date('d/m/Y', htmlspecialchars($donnees['event_date'])).' de '.date('H:i', htmlspecialchars($donnees['event_date'])).' &agrave; '.date('H:i', htmlspecialchars($donnees['event_datefin'])).' GMT+1'; ?>
            <em>- <?php echo stripslashes($donnees['event_theme']); ?></em>
           par <?php echo stripslashes($donnees['event_presentepar']); ?>
           - <?php echo $donnees['event_remplissage']; ?>/<?php echo $donnees['event_capacitemax']; ?>
        <em><a href="inscrevent.php?evid=<?php echo $donnees['event_id'];?>">D&#233;tails</a></em>
        </p>
    </div>
    <?php
    } // Fin de la boucle des events
    $req->closeCursor();
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
</div>

</div> <!--fin milieu-->
 </div> <!--fin corps-->

</body>
</html>
