<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Bienvenue - Espace priv&#233; du Laboratoire ROMAMBOB</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" media="screen" type="text/css" title="css" href="dstyle/main.css" />
		<link rel="stylesheet" media="screen" type="text/css" title="css" href="dstyle/formu.css" />	
		<script type="text/javascript" src="js/veriform.js"></script>    
	</head>
    <body>
 
 
 <div id="tete">
 <table>
 <tr>
 <td>
 	<img src="dimages/rometlogo.png" alt="logo romambob" title="logo romambob" />
 </td>
 <td class="sst">
 Interface de gestion des &#233;v&#233;nements locaux et <br />internationaux du Laboratoire
 </td>
 </tr>
 </table>
 </div>
 
 
 <div id="navbar">
 
 <p> <a href="index.php">Accueil</a>
  <a href="moncompte.php">Compte</a>
  <a href="listevent.php">R&#233;servations</a>
  <?php 
  if(($_SESSION['rang'] == 'alice') or ($_SESSION['rang'] == 'delegate') ){
	?> <a href="addevent.php">Ajouter</a> <?php } ?>
  <a href="deco.php">D&#233;connexion</a>
  </p>
 </div>
 <div id="corps">
 <div id="milieu">
<br />
 