<?php
session_start();
require('dinclude/verifs.php');
require('dinclude/hautdepage.php');	
?>
	
	 <h2>Pr&#233;sentation du site </h2>
	 <br />

 <p>Bonjour, <?php echo $_SESSION['nom']; ?>.</p>
 <p>Ce site a pour vocation de g&#233;rer la planification d'&#233;v&#233;nements des laboratoires pharmaceutiques ROMANBOB en permettant la communication entre ses 13 succursales &agrave; travers 8 pays de l'Union Europ&#233;enne.
</p><p>
Vous pouvez faire des r&#233;servations et les g&#233;rer via 
<em><a href="moncompte.php">votre compte</a></em>.
</p><p>
Un-e d&#233;l&#233;gu&#233;-e &agrave; la communication est pr&#233;sent-e sur chaque site et pourra
<?php if($_SESSION['rang'] == 'delegate'){
	?> <em><a href="addevent.php">organiser</a></em> <?php 
	} else { 
		echo 'organiser';} ?>
	des &#233;v&#233;nements locaux.
</p><p>
Alice Nevers, Directrice de la Communication, pourra
<?php if($_SESSION['rang'] == 'alice'){
	?> <em><a href="addevent.php">cr&#233;er</a></em> <?php 
	} else { 
		echo 'cr&#233;er';} ?>
	des  &#233;v&#233;nements inter-succursale et y inviter toutes les personnes du Groupe.
</p><p>
Les &#233;v&#233;nements ont une capacit&#233; limit&#233;e donc 
<em><a href="listevent.php">inscrivez-vous</a></em>  vite !</p>
 
 </div> <!--fin milieu-->
 </div> <!--fin corps-->
  	
    </body>
</html>
