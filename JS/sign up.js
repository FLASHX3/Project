var a  // verificateur du nom
var b  // verificateur du pseudo
var c  // verificateur de l'école
var d  // verificateur d'email
var e  // verificateur du mot de passe
var f  // confirmateur de mot de passe

function surligne(champ,erreur)
{
	if(erreur)
	{
		champ.style.borderColor="red";
	}else{
		champ.style.borderColor="blue";
	}
}

function verif_name(nom)
{
	var erreur=document.getElementById('err_name');
	var regex=/^[A-Z][a-z-ôâï ]{1,24}$/;
	if(!regex.test(nom.value)){
		a=false;
		surligne(nom,true);
		erreur.innerHTML="invalid name! capital letter in first letter";
	}else{
		a=true;
		surligne(nom,false);
		erreur.innerHTML="";
	}
	return a;
}

function verif_user_name(pseudo)
{
	var erreur=document.getElementById('err_user_name');
	var regex=/^[a-zA-Z@éèç0-9-._# ]{3,25}$/;
	if(!regex.test(pseudo.value)){
		b=false;
		surligne(pseudo,true);
		erreur.innerHTML="invalid user name!";
	}else{
		b=true;
		surligne(pseudo,false);
		erreur.innerHTML="";
	}
	return b;
}

function verif_school(school)
{
	var erreur=document.getElementById('err_school');
	var regex=/^[A-Z][a-zA-Z-éèô ]{3,38}$/;
	if(!regex.test(school.value))
	{
		c=false;
		surligne(school,true);
		erreur.innerHTML="invalid school! capital letter in first letter";
	}else{
		c=true;
		surligne(school,false);
		erreur.innerHTML="";
	}
	return c;
}

function verif_email(mail)
{
	var erreur=document.getElementById('err_email');
	var regex=/^[a-zA-Z0-9.-_]{1,}@[a-z0-9.-_]{2,}\.[a-z]{2,4}$/;

	if(!regex.test(mail.value))
	{
		d=false;
		surligne(mail,true);
		erreur.innerHTML="invalid email!";
	}else{
		surligne(mail,false);
		d=true;
		erreur.innerHTML="";
	}
	return d;
}

function verif_password(mdp)
{
	var erreur=document.getElementById('err_password');
	var regex=/^[a-zA-Z0-9éèôâêîï.-_*@&$]{8}$/;
	if(!regex.test(mdp.value))
	{
		e=false;
		surligne(mdp,true);
		erreur.innerHTML="8 charaters maximum!";
	}else{
		e=true;
		surligne(mdp,false);
		erreur.innerHTML="";
	}
	return e;
}

function verif_conf_pass(cmdp)
{
	var erreur=document.getElementById('err_conf_password');
	var test=verif_password(document.getElementById('password'));
	var regex=/^[a-zA-Z0-9éèôâêîï.-_*@&$]{8}$/;
	if(regex.test(cmdp.value)){
		if(test){
			if(cmdp.value==document.getElementById('password').value)
			{
				f=true;
				surligne(cmdp,false);
				erreur.innerHTML="";
			}else{
				f=false;
				surligne(cmdp,true);
				erreur.innerHTML="Passwords are not identiques!";
			}
		}else{
			f=false;
			surligne(cmdp,true);
			erreur.innerHTML="Please fill in the password field";
		}
	}else{
		f=false;
		surligne(cmdp,true);
		erreur.innerHTML="letter, number,*_-.&@$éèôâêîï)";
	}
	return f;
}

function verif_form(form)
{
	var name_ok=verif_name(form.name);
	var user_name_ok=verif_user_name(form.username);
	var school_ok=verif_school(form.school);
	var email_ok=verif_email(form.email);
	var mdp_ok=verif_password(form.password);
	var cmdp_ok=verif_conf_pass(form.confirmpassword);

	if(name_ok && user_name_ok && email_ok && mdp_ok && cmdp_ok && school_ok)
	{
		return true;
	}else{
		return false;
	}
}