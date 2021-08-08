var a  //verificateur du login
var b  //verificateur du mot de passe
var c  //verificateur d'email
var d //verificateur de document

function surligne(champ,erreur)
{
	if(erreur)
	{
		champ.style.borderColor="red";
	}else{
		champ.style.borderColor="blue";
	}
}

function verif_log(log)
{
	var erreur=document.getElementById('err_log');
	var regex=/^[a-zA-Z0-9.-_]{2,}@[a-z0-9.-_]{2,}\.[a-z]{2,4}$/;

	if(!regex.test(log.value))
	{
		a=false;
		surligne(log,true);
		erreur.innerHTML="invalid email!";
	}else{
		surligne(log,false);
		a=true;
		erreur.innerHTML="";
	}
	return a;
}

function verif_mdp(mdp)
{
	var erreur=document.getElementById('err_mdp');
	var regex=/^[a-zA-Z0-9.-_*@&$]{8}$/;

	if(!regex.test(mdp.value))
	{
		b=false;
		surligne(mdp,true);
		erreur.innerHTML="8 charaters maximum!";
	}else{
		b=true;
		surligne(mdp,false);
		erreur.innerHTML="";
	}
	return b;
}

function verif_form(form)
{
	var log_ok=verif_log(form.loginUser);
	var mdp_ok=verif_mdp(form.loginPassword);

	if(log_ok && mdp_ok)
	{
		return true;
	}else{
		return false;
	}
}

	function verif_doc(doc){
		var nom_fichier=doc.files[0].name;
		var taille_fichier=doc.files[0].size;
		var type_fichier=doc.files[0].type;
		var date_modif=doc.files[0].lastModifiedDate;

		var pdf="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
		var txt="text/plain";
		var pptx="application/vnd.openxmlformats-officedocument.presentationml.presentation";
		var xlsx="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
		var docx="application/vdn.openxmlformats-officedocument.wordprocessingml.document";
		var zip="application/x-zip-compressed";

		if(type_fichier=pdf || type_fichier==txt || type_fichier==pptx || type_fichier==xlsx || type_fichier=docx || type_fichier==zip){
			if(taille_fichier<20971520){  //fichier inférieur à 20mo
				d=true;
			}else{
				d=false;
				alert("This file is too weighty");
			}
		}else{
			d=false;
			alert("Only pdf,txt,pptx,xlsx,docx,zip");
		}
		return d;
	}

	function verif(form){
		var doc_ok=verif_doc(form.file);
		if (doc_ok){
			return true;
		}else{
			return false;
		}
	}

	function active(){
		var envoi=document.getElementById('Envoyer');
		var message=document.getElementById("message");

		if(message.value==""){
			envoi.style.visibility="hidden";
		}else{
			envoi.style.visibility="visible";
		}
	}