var a  //verificateur du login
var b  //verificateur du mot de passe
var c  //verificateur d'email

function surligne(champ,erreur)
{
	if(erreur)
	{
		champ.style.borderColor="red";
	}else{
		champ.style.borderColor="blue";
	}
}

function verif_log(log,n)
{
	if(n==0){
		var erreur=document.getElementById('err_log'); break;
	}else if(n==1){
		var erreur=document.getElementById('err_forgot_email'); break;
	}

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

function verif_form_fg(form)
{
	var email_ok=verif_log(form.email,1);
	if(email_ok){
		return true;
	}
	else{
		return false;
	}
}