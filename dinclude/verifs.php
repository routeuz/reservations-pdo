<?php
//si un element de session n'est pas rempli, rang par exemple...
if(!isset($_SESSION['rang'])) {
   		header('Location: auth.php'); 
   		// On redirige vers le formulaire d'identification
   		exit;
}
?>