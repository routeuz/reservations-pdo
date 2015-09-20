String.prototype.trim = function(){
    return this.replace(/(?:^\s+|\s+$)/g, "");
}


function verif_formulaire(){

	// vérification saisie cmax
	if (document.formulaire.cmax.value.trim() == ""){
		alert("Vous avez oublie de renseigner la CAPACITE MAX !");
		document.formulaire.cmax.focus();
		return (false);
	}
	
	if((isNaN(document.formulaire.cmax.value))||(document.formulaire.cmax.value.length < 0)){
	alert("Revoir CAPACITE MAX.");
	document.formulaire.cmax.focus();
	return(false);
	}
	
	//verif heure minute debut et fin
	if ((document.formulaire.heurefin.value.trim() == "")||(document.formulaire.minutefin.value.trim() == "")){
		alert("Vous avez mal renseigne l'HEURE DE FIN!");
		return (false);
	}
	
	if ((isNaN(document.formulaire.heurefin.value)) || (document.formulaire.heurefin.value >23) || (document.formulaire.heurefin.value.length > 2) || (document.formulaire.heurefin.value < 0)){
			alert("L'HEURE DE FIN que vous avez saisie est invalide !");
			document.formulaire.heurefin.focus();				
			return (false); 
	}
	
	if ((isNaN(document.formulaire.minutefin.value)) || (document.formulaire.minutefin.value >59) || (document.formulaire.minutefin.value.length>2) || (document.formulaire.minutefin.value <0)){
			alert("Le nombre de MINUTES que vous avez saisi est invalide !");
			document.formulaire.minutefin.focus();				
			return (false); 
	}
	
	if ((document.formulaire.heure.value.trim() == "")||(document.formulaire.minute.value.trim() == "")){
		alert("Vous avez mal renseigne l'HEURE !");
		document.formulaire.focus();
		return (false);
	}
	
	if ((isNaN(document.formulaire.heure.value)) || (document.formulaire.heure.value >23) || (document.formulaire.heure.value.length>2) || (document.formulaire.heure.value <0)){
			alert("L'HEURE que vous avez saisie est invalide !");
			document.formulaire.heure.focus();				
			return (false); 
	}
	
	if ((isNaN(document.formulaire.minute.value)) || (document.formulaire.minute.value >59) || (document.formulaire.minute.value.length>2) || (document.formulaire.minute.value <0)){
			alert("Le nombre de MINUTES que vous avez saisi est invalide !");
			document.formulaire.minute.focus();				
			return (false); 
	}
	
	
	//verif jour mois et annee evt
	if ((document.formulaire.jour.value.trim() == "")||(document.formulaire.mois.value.trim() == "")||(document.formulaire.annee.value.trim()=="")){
		alert("Vous avez mal renseigne la DATE");
		return (false);
	}
	
	if ((isNaN(document.formulaire.jour.value)) || (document.formulaire.jour.value >31) || (document.formulaire.jour.value.length>2) || (document.formulaire.jour.value <0)){
			alert("Le JOUR que vous avez saisi est invalide !");
			document.formulaire.jour.focus();				
			return (false); 
	}
	
	if ((isNaN(document.formulaire.mois.value)) || (document.formulaire.mois.value >12) || (document.formulaire.mois.value.length>2) || (document.formulaire.mois.value <0)){
			alert("Le MOIS que vous avez saisi est invalide !");
			document.formulaire.mois.focus();				
			return (false); 
	}
		
	if (isNaN(document.formulaire.annee.value) || (document.formulaire.annee.value <2011 ) || (document.formulaire.annee.value >2015 )|| (document.formulaire.annee.value.length!=4)){
			alert("L'ANNEE que vous avez saisie est invalide !")
			document.formulaire.annee.focus();				
			return (false); 
	}
	
	// vérification saisie THEME
	if ((document.formulaire.theme.value.trim() == "")){
		alert("Vous avez oublie de renseigner le THEME.");
		document.formulaire.theme.focus();
		return (false);
	}
	
	// vérification saisie THEME
	if ((document.formulaire.pres.value.trim() == "")){
		alert("Vous avez oublie de renseigner le nom de la personne qui PRESENTERA.");
		document.formulaire.pres.focus();
		return (false);
	}
	
	// vérification saisie LIEU
	if (document.formulaire.lieu.value.trim() == ""){
		alert("Vous avez oublie de renseigner le LIEU.");
		document.formulaire.lieu.focus();
		return (false);
	}
	
	// vérification saisie DESCRIPTION
	if (document.formulaire.descrip.value.trim() == ""){
		alert("Vous avez oublie de renseigner la DESCRIPTION");
		document.formulaire.descript.focus();
		return (false);
	}
}