var a  //verificateur de l'école
var b  //verificateur de logo

function surligne(champ,erreur){
	if(erreur){
		champ.style.boderColor="red";
	}else{
		champ.style.boderColor="blue";
	}
}

function verif_ecole(ecole) {
	var erreur=document.getElementById('err_name');
	regex=/^[A-Z][a-zA-Z-._ éèôç']{1,24}$/;
	if(!regex.test(ecole.value)){
		a=false;
		surligne(ecole,true);
		erreur.innerHTML="Capital letter in first letter!";
	}else{
		a=true;
		surligne(ecole,false);
		erreur.innerHTML="";
	}
	return a;
}

function verif_logo(logo){
	var erreur=document.getElementById('err_logo');
	var nom_fichier=logo.files[0].name;
	var taille_fichier=logo.files[0].size;
	var type_fichier=logo.files[0].type;
	var date_modif=logo.files[0].lastModifiedDate;

	if(type_fichier=="image/jpg" || type_fichier=="image/jpeg" || type_fichier=="image/png"  || type_fichier=="image/PNG" || type_fichier=="image/JPG" || type_fichier=="image/JPEG"){
		if(taille_fichier<1048576){  //image inférieure à 1mo
			b=true;
			surligne(logo,false);
			erreur.innerHTML="";
		}
		else{
			b=false;
			surligne(logo,true);
			erreur.innerHTML="This file is too weighty";
		}
	}
	else{
		b=false;
		surligne(logo,true);
		erreur.innerHTML="Only jpg, jpeg and png";
	}
	return b;
}

function verif(form) {
	var ecole_ok=verif_ecole(form.établissement);
	var logo_ok=verif_logo(form.logo);
	if(ecole_ok && logo_ok){
		return true;
	}else{
		return false;
	}
}