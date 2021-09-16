var a  // verificateur du nom
var b  // verificateur du pseudo
var c  // verificateur de l'école
var d  // verificateur d'email
var e  // verificateur du mot de passe
var f  // confirmateur de mot de passe
var g  // verificateur d'age

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
	var regex=/^[A-Z][a-z -_éèôâêîïç]{1,24}$/;
	if(nom.value==""){
		surligne(nom,false);
		erreur.innerHTML="";
	}else{
		if(!regex.test(nom.value)){
			a=false;
			surligne(nom,true);
			erreur.innerHTML="invalid name! capital letter in first letter";
		}else{
			a=true;
			surligne(nom,false);
			erreur.innerHTML="";
		}
	}
	return a;
}

function verif_user_name(pseudo)
{
	var erreur=document.getElementById('err_user_name');
	var regex=/^[a-zA-Z0-9 -._çéèôâêîï@$#]{3,25}$/;
	if(pseudo.value==""){
		surligne(pseudo,false);
		erreur.innerHTML="";
	}else{
		if(!regex.test(pseudo.value)){
			b=false;
			surligne(pseudo,true);
			erreur.innerHTML="invalid user name!";
		}else{
			b=true;
			surligne(pseudo,false);
			erreur.innerHTML="";
		}
	}
	return b;
}

function verif_school(school)
{
	//alert(school.options[school.selectedIndex].value);
	var erreur=document.getElementById('err_school');
	var regex=/^[A-Z][a-zA-Z-éèêôçï' ]{2,38}$/i;
	if(school.options[school.selectedIndex].value==""){
		surligne(school,true);
		erreur.innerHTML="Undefined school!";
	}else{
		if(!regex.test(school.options[school.selectedIndex].value))
		{
			c=false;
			surligne(school,true);
			erreur.innerHTML="invalid school! capital letter in first letter";
		}else{
			c=true;
			surligne(school,false);
			erreur.innerHTML="";
		}
	}
	return c;
}

function verif_age(age) {
	var erreur=document.getElementById('err_age');
	var regex=/^[0-9]{2}$/;
	if(age.value==""){
		surligne(age,false);
		erreur.innerHTML="";
	}else{
		if(!regex.test(age.value)){
			g=false;
			surligne(age,true);
			erreur.innerHTML="invalid age!";
		}else{
			g=true;
			surligne(age,false);
			erreur.innerHTML="";
		}
	}
	return g;
}

function verif_email(mail)
{
	var erreur=document.getElementById('err_email');
	var regex=/^[a-zA-Z0-9._-]{1,}@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	if(mail.value==""){
		surligne(mail,false);
		erreur.innerHTML="";
	}else{
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
	}	
	return d;
}

function verif_password(mdp)
{
	var erreur=document.getElementById('err_password');
	var regex=/^[a-zA-Z0-9éèôâêîï.-_*@&$]{8}$/;
	if(mdp.value==""){
		surligne(mdp,false);
		erreur.innerHTML="";
	}else{
		if(!regex.test(mdp.value))
		{
			e=false;
			surligne(mdp,true);
			erreur.innerHTML="8 charaters! (éèôâêîï.-_*@&$) autorised";
		}else{
			e=true;
			surligne(mdp,false);
			erreur.innerHTML="";
		}
	}
	return e;
}

function verif_conf_pass(cmdp)
{
	var erreur=document.getElementById('err_conf_password');
	var test=verif_password(document.getElementById('password'));
	var regex=/^[a-zA-Z0-9éèôâêîï.-_*@&$]{8}$/;
	if(cmdp.value==""){
		surligne(cmdp,false);
		erreur.innerHTML="";
	}else{
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
				erreur.innerHTML="Please fill in the password field!";
			}
		}else{
			f=false;
			surligne(cmdp,true);
			erreur.innerHTML="letter, number,éèôâêîï.-_*@&$";
		}
	}
	return f;
}

function verif_form(form)
{
	var name_ok=verif_name(form.name);
	var user_name_ok=verif_user_name(form.username);
	var school_ok=verif_school(form.school);
	var age_ok=verif_age(form.age);
	var email_ok=verif_email(form.email);
	var mdp_ok=verif_password(form.password);
	var cmdp_ok=verif_conf_pass(form.confirmpassword);

	if(name_ok && user_name_ok && email_ok && mdp_ok && cmdp_ok && school_ok && age_ok)
	{
		return true;
	}else{
		return false;
	}
}