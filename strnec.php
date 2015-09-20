<?php session_start();
try
{
	
	if(!isset($_POST['username']) or !isset($_POST['modp'])) {
		echo "<p>Vous n'avez pas tout rempli</p>";
   		include('auth.php'); // On inclut le formulaire d'identification
   		exit; //et on sort
   		
	}
	
  	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=alice', 'root', 'root', $pdo_options);
    
    // On récupère le mot de passe qui correspond à l'username
    
   	$req = $bdd->prepare("SELECT * FROM alice.employee WHERE emp_username = :user ");
    $req->bindValue(":user", $_POST['username'], PDO::PARAM_STR);
    $req->execute();
    
    $nbresultats = $req->rowCount();
    
    $userdonnees = $req->fetch();
    
    //echo var_dump($userdonnees);
    
    // si la requete ne retourne rien
    if($nbresultats == 0){
    	echo "<p>Cette personne n'existe pas.</p>";
    	include('auth.php');
    	exit;
    }
   
    if($userdonnees['emp_mdp'] != md5($_POST['modp'])) {
    	echo '<p>Mauvais mot de passe.</p>';
    	include('auth.php');
    	exit;
 	}else{
   	 	//on remplit les variables de session avec les informations du compte
   	 	$_SESSION['empid'] = $userdonnees['emp_id'];
   	 	$_SESSION['pseudo'] = $userdonnees['emp_username'];
   	 	$_SESSION['succursale'] = $userdonnees['emp_succursale'];
   	 	$_SESSION['rang'] = $userdonnees['emp_rang'];
    	$_SESSION['nom'] = $userdonnees['emp_nom'];
    	
 	
 	 } 

    $req->closeCursor();
    
    //on récupère l'id de l'employee delegate de l'employee courrant
    if(isset($_SESSION['succursale'])){
		$req2 = $bdd->prepare("SELECT emp_id FROM alice.employee WHERE emp_succursale = :su AND emp_rang = 'delegate' ");
    	$req2->bindValue(":su", $_SESSION['succursale'], PDO::PARAM_STR);
    	$req2->execute();
    	$dataa = $req2->fetch();
    	//on met le met dans les variables de session
    	$_SESSION['idelegate'] = $dataa['emp_id'];
    
		$req2->closeCursor();
		
		//si tout est ok on redirige vers l'index du site
    	header('Location: index.php');
    }
	
}
catch(Exception $e)
		{
    		die('Erreur : '.$e->getMessage());
		}
  ?>
 