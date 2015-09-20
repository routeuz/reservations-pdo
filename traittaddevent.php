<?php
session_start();
if(!isset($_SESSION['rang']) or $_SESSION['rang'] == 'standard') {
   		header('Location: auth.php'); 
   		// On redirige vers le formulaire d'identification
}

//verification de remplissage du formulaire
if(!isset($_POST['heure']) or !isset($_POST['minute']) or !isset($_POST['heurefin']) or !isset($_POST['minutefin']) or !isset($_POST['mois']) or  !isset($_POST['jour']) or !isset($_POST['annee']) or !isset($_POST['lieu']) or !isset($_POST['theme']) or !isset($_POST['pres']) or !isset($_POST['descrip']) or !isset($_POST['cmax'])){
	//echo 'smth not set';
	header('Location: addevent.php');
}


//checkdate retourne true si la date est valide - echec sinon
if (!(checkdate($_POST['mois'], $_POST['jour'], $_POST['annee']))){
	//echo 'date non valide';
	header('Location: addevent.php');
}

//on vérifie la validité de des heures saisies - echec sinon
if(($_POST['heure']) < 0 or ($_POST['heure'] > 23) or ($_POST['minute'] < 0) or ($_POST['minute'] > 59)){
	//echo 'validite h debut';
	header('Location: addevent.php');
}
if(($_POST['heurefin']) < 0 or ($_POST['heurefin'] > 23) or ($_POST['minutefin'] < 0) or ($_POST['minutefin'] > 59)){
	//echo 'validite h fin';
	header('Location: addevent.php');
}

//on convertit les dates en timestamp
$datevent = mktime($_POST['heure'], $_POST['minute'], 0, $_POST['mois'], $_POST['jour'], $_POST['annee']);
//echo $datevent;
$dateventfin = mktime($_POST['heurefin'], $_POST['minutefin'], 0, $_POST['mois'], $_POST['jour'], $_POST['annee']);
//echo $dateventfin;

//echec si la date de début est plus tard que la date de fin
if($dateventfin < $datevent){
	//echo 'debut superieur a fin';
	header('Location: addevent.php');
}

//echec si la date de début est moins de 10 heures avant maintenant. une heure = 3600 secondes
if($datevent < (time()+ 18000)){
	//echo 'moins de 5h';
	header('Location: addevent.php');
}


//si pas d'echec on ajoute l'evenement à la table
try{
	
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 	$bdd = new PDO('mysql:host=localhost;dbname=alice', 'root', 'root', $pdo_options);
 	
 	$req = $bdd->prepare('INSERT INTO event(event_id, event_ajoutpar, event_date, event_datefin, event_lieu, event_theme, event_presentepar, event_description, event_capacitemax, event_remplissage) VALUES("", :event_ajoutpar, :event_date, :event_datefin, :event_lieu, :event_theme, :event_presentepar, :event_description, :event_capacitemax, "")');
 	
 	$req->execute(array(
 	'event_ajoutpar' => $_SESSION['empid'],
 	'event_date' => $datevent,
 	'event_datefin' => $dateventfin,
 	'event_lieu' => $_POST['lieu'], 
 	'event_theme' => $_POST['theme'],
 	'event_presentepar' => $_POST['pres'],
 	'event_description' =>  $_POST['descrip'],
 	'event_capacitemax' => $_POST['cmax'],
 	)) or die(print_r($req->errorInfo()));
	
 	$req->closeCursor();
 	
 	//echo 'pas de pb';
 	header('Location: listevent.php');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

?>