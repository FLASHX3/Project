var a  //verificateur du login
var b  //verificateur du mot de passe

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
	var regex=/^[a-zA-Z@éèç0-9-._# ]{3,25}$/;

	if(!regex.test(log.value))
	{
		a=false;
		surligne(log,true);
		erreur.innerHTML="invalid user name";
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