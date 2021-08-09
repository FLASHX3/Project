var a //verificateur de document

function active(message){
	var envoi=document.getElementById('Envoyer');

	if(message.value==""){
		envoi.style.visibility="hidden";
	}else{
		envoi.style.visibility="visible";
	}
}

function verif_doc(doc){
	var nom_fichier=doc.files[0].name;
	var taille_fichier=doc.files[0].size;
	var type_fichier=doc.files[0].type;

	/*var pdf="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
	var txt="text/plain"
	var pptx="application/vnd.openxmlformats-officedocument.presentationml.presentation"
	var xlsx="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
	var docx="application/vdn.openxmlformats-officedocument.wordprocessingml.document"
	var zip="application/x-zip-compressed"*/

	if(type_fichier=="image/jpg" || type_fichier=="image/jpeg" || type_fichier=="image/png" || type_fichier=="text/plain" ||type_fichier="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || type_fichier=="application/vdn.openxmlformats-officedocument.wordprocessingml.document" || type_fichier=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || type_fichier="application/vnd.openxmlformats-officedocument.presentationml.presentation" || type_fichier=="application/x-zip-compressed"){
		if(taille_fichier<20971520){  //image inférieure à 20mo
			a=true;
		}
		else{
			a=false;
			alert("This file is too weighty");
		}
	}
	else{
		a=false;
		alert("Only jpg, jpeg,png,txt,pdf,docx,xlsx,pptx,zip");
	}
	return a;
}

function verif(form){
	var doc_ok=verif_doc(form.file);
	if (doc_ok){
		return true;
	}else{
		return false;
	}
}