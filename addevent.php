<?php
session_start();
if(!isset($_SESSION['rang']) or $_SESSION['rang'] == 'standard') {
   		header('Location: auth.php'); 
   		// On redirige vers le formulaire d'identification
}
require('dinclude/hautdepage.php');

?>
    
 
	 <h2>Ajouter un &#233;v&#233;nement </h2>
	<br />
<div class="scro">
	 	 <form method="post" action="traittaddevent.php" onsubmit="return verif_formulaire()" onreset="alert('Cette action va effacer tous les champs !')" name="formulaire">

	<fieldset>
				<legend>Organisation</legend>
				Date : le 
				<input name="jour" type="text" size="1" maxlength="2" /> /
				<input name="mois" type="text" size="1" maxlength="2" /> /
				<input name="annee" type="text" size="2" maxlength="4" /> (jj/mm/aaaa)
				 de
				 <input name="heure" type="text" size="1" maxlength="2" /> H
				<input name="minute" type="text" size="1" maxlength="2" /> min
				 &#224;
				<input name="heurefin" type="text" size="1" maxlength="2" /> H
				<input name="minutefin" type="text" size="1" maxlength="2" /> min
				<br />
				Nombre maximal de personnes autoris&#233;es &#224; assister &#224; l'&#233;v&#233;nement : 
				<input name="cmax" type="text" size="5" />
				
	</fieldset>
	<p></p>
	<fieldset>
				<legend>Informations G&#233;n&#233;rales</legend>
				<p>
				 Theme  					 
				<input name="theme" size="70"type="text" />
				<br /> <em>Ex : Salon pharmaceutique, webex, r&#233;union des cadres...</em>
				<br /><br /> Lieu 					 
				<input name="lieu" size="70" type="text" />
				<br /> &#233;v&#233;nement pr&#233;sent&#233; par
				<input name="pres" size="70" type="text" />
				
				<br /><br />
				Description de l'&#233;v&#233;nement <br />
				<textarea name="descrip" rows="9" cols="75">Venez nombreuses et nombreux !</textarea>
				</p>
	</fieldset>
	<p><input value="Cr&#233;er l'&#233;v&#233;nement !" type="submit" />
	<input value="Recommencer" type="reset" />
	</p>
	</form>
	<p>
<span style="font-size:small; color: red;"> Tous les champs sont obligatoires. <br/> Vous ne pouvez pas ajouter d'&#233;v&#233;nement qui commence dans moins de 5 heures. </span>
</p>

</div>
</div>
</div>
</body>
</html>

