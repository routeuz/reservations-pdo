<?php
session_start();
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=alice', 'root', 'root', $pdo_options);
    
//1. maj remplissage de table event
	$reqx = $bdd->prepare("UPDATE alice.event SET event_remplissage=event_remplissage-1 WHERE event_id = :indexx ");
    $reqx->bindValue(":indexx", $_SESSION['evt_courrant'], PDO::PARAM_INT);
    $reqx->execute();
    $reqx->closeCursor();
 
//2. on efface la presence    
    $req1 = $bdd->prepare("DELETE FROM alice.attendance WHERE id_emp = :nomemp AND id_event = :idev ");
	$req1->bindValue(":nomemp", $_SESSION['empid'], PDO::PARAM_INT);
	$req1->bindValue(":idev", $_SESSION['evt_courrant'], PDO::PARAM_INT);
	$req1->execute();
    $req1->closeCursor();

    header('Location: moncompte.php');
	
	
	}
catch(Exception $e)
		{
    		die('Erreur : '.$e->getMessage());
		}


?>