<?php
session_start();
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=alice', 'root', 'root', $pdo_options);
    
//1. maj remplissage de table event
	$reqx = $bdd->prepare("UPDATE alice.event SET event_remplissage = event_remplissage + 1 WHERE event_id = :indexx ");
    $reqx->bindValue(":indexx", $_SESSION['evt_courrant'], PDO::PARAM_INT);
    $reqx->execute();
    $reqx->closeCursor();
     

//2. insert dans la table presence
	
	$req = $bdd->prepare('INSERT INTO alice.attendance(id_attend, id_emp, id_event) VALUES ("", :emp_id, :event_id)');
 	$req->execute(array(
 	'emp_id' => $_SESSION['empid'],
 	'event_id' => $_SESSION['evt_courrant'], 
 	)) or die(print_r($req->errorInfo()));
	
	
	$req->closeCursor();
	
	header('Location: moncompte.php');
	
}
catch(Exception $e)
		{
    		die('Erreur : '.$e->getMessage());
		}

?>