function verifNom(textarea){
	var nom=textarea.value;
	if(! /^[A-Z][a-z]+$/.test(nom)){
		alert("Vérifier que le nom commence par une majuscule et est suivi exclusivement de minuscules non accentuées");
		return false;
	}
	return true;
}

function appelApresVerif(){
	var textarea = document.getElementById("nom");
	if(verifNom(textarea)){
		window.location.href="salut.php?nom="+textarea.value;
	}
	return false;
}

function messageLocal(){
	var textarea = document.getElementById("nom");
	if(verifNom(textarea)){
		var h3=document.createElement("h3");

		h3.appendChild(document.createTextNode("Salutations "+textarea.value));
		h3.setAttribute("style","color:red");
		document.body.appendChild(h3);
	}
	return false;
}
