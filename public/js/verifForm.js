document.querySelector('#form').onsubmit = function checkForm(e)
{
    //e.preventDefault();
    var tabName = new Array(
        "nom",
        "prenom",
        "datenaissance",
        "codepostal",
        "mail");
    var tabFiltre = new Array(
        '^[A-Za-z]{3,}$',
        '^[A-Za-z]{3,}$',
        '^([0-2][0-9]|[3][0-1])/([0][1-9]|[1][0-2])/[0-2][0-9]{3}$',
        '^[0-9]{5}$',
        '^[0-9A-Za-z._-]+@{1}[0-9A-Za-z._-]{2,}[.]{1}[a-z]{2,4}$');
    var tabError = new Array(
        "Le nom doit comporter au moins 3 caractères alphabétique.",
        "Le prenom doit comporter au moins 3 caractères alphabétique.",
        "La date doit etre au format dd/mm/aaaa.",
        "Le Code postal doit comporter 5 caractères numériques.",
        'L\'Email doit etre de format "(Utilisateur)@(Nom de domaine).(extension)", par exemple "nom.prenom@site.fr".');
    var check = true;
    for (i=0; i < this.length; i++) 
    {
        var message = "Taille = "+ this.length + " - i = "+ i + "\n" ;
        var name = this.elements[i].name;
        var value = this.elements[i].value;
        if(VerifChampsNull(true,value))
        {
            if(tabName.indexOf(name) != -1)
            {  
                var filtre = new RegExp(tabFiltre[tabName.indexOf(name)]);
                var estFiltre = filtre.test(value);
                if(!estFiltre)
                {
                    
                    document.getElementById(("error"+ name)).innerHTML = tabError[tabName.indexOf(name)];
                    check = false;
                }
                else
                {
                    document.getElementById(("error"+ name)).innerHTML = "";
                }
            }
        }
    }
    return check;
}

function VerifChampsNull(nullAutorise,value)
{
    var estAutorise = false;
    if(nullAutorise == false && value != "")
    {
        estAutorise = true;
    }
    else if(nullAutorise == true)
    {
        estAutorise = true;
    }
    return estAutorise;
}

function VerifCheck(name)
{
    var valeur = false;
    for (i=0; i <document.getElementsByName(name).length; i++) 
    {
        if (document.getElementsByName(name)[i].checked) 
        {
			valeur = true;
		}
    }
    return valeur;
}

// document.querySelector('#form').onsubmit = function checkForm()
// {
//     var check = false;
//     var filtre = new RegExp(/^[A-Za-z]{3,}$/);
//     var estFiltre = filtre.test(document.getElementById("nom").value);
//     if(!estFiltre)
//     {
//         document.getElementById("errorNom").innerHTML = "Le nom doit comporter au moins 3 caractères alphabétique.";
//         check = false; // do not submit the form
//     }
//     else
//     {
//         document.getElementById("errorNom").innerHTML = "";
//     }

//     estFiltre = filtre.test(document.getElementById("prenom").value);
//     if(!estFiltre)
//     {
//         document.getElementById("errorPrenom").innerHTML = "Le prenom doit comporter au moins 3 caractères alphabétique.";
//         check = false; // do not submit the form
//     }
//     else
//     {
//         document.getElementById("errorPrenom").innerHTML = "";
//     }

//     estFiltre = VerifCheck("radio");
//     if(!estFiltre)
//     {
//         document.getElementById("errorRadio").innerHTML = "Le sexe doit etre selectionné.";
//         check = false; // do not submit the form
//     }
//     else
//     {
//         document.getElementById("errorRadio").innerHTML = "";
//     }

//     filtre = new RegExp(/^([0-2][0-9]|[3][0-1])\/([0][1-9]|[1][0-2])\/[0-2][0-9]{3}$/);
//     estFiltre = filtre.test(document.getElementById("datenaissance"));
//     if(!estFiltre)
//     {
//         document.getElementById("errorDate").innerHTML = "La date doit etre au format dd/mm/aaaa.";
//         check = false; // do not submit the form
//     }
//     else
//     {
//         document.getElementById("errorDate").innerHTML = "";
//     }

//     filtre = new RegExp(/^[0-9]{5}$/);
//     estFiltre = filtre.test(parseInt(document.getElementById("codepostal").value));
//     if(!estFiltre)
//     {
//         document.getElementById("errorCodepostal").innerHTML = "Le Code postal doit comporter 5 caractères numériques.";
//         check = false; // do not submit the form
//     }
//     else
//     {
//         document.getElementById("errorCodepostal").innerHTML = "";
//     }

//     //var filtreMail = new RegExp(/[@]+/);
//     //var filtreMail = new RegExp(/^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/);
//     //[a-zA-Z\d._]+@[a-zA-Z\d.]+.[a-zA-Z\d.]{2,}+
//     filtre = new RegExp(/^[0-9A-Za-z._-]+@{1}[0-9A-Za-z._-]{2,}[.]{1}[a-z]{2,4}$/);
//     estFiltre = filtre.test(document.getElementById("mail").value);
//     if(!estFiltre)
//     {
//         document.getElementById("errorEmail").innerHTML = 'L\'Email doit etre de format "(Utilisateur)@(Nom de domaine).(extension)", par exemple "nom.prenom@site.fr".';
//         check = false; // do not submit the form
//     }
//     else
//     {
//         document.getElementById("errorEmail").innerHTML = "";
//     }
//     filtre = document.getElementById("question").value;
//     if(filtre == "")
//     {
//         document.getElementById("errorQuestion").innerHTML = "Veuillez poser une question svp.";
//         check = false; // do not submit the form
//     }
//     else
//     {
//         document.getElementById("errorQuestion").innerHTML = "";
        
//     }
//     filtre = VerifCheck("accepter");
//     if(!filtre)
//     {
//         document.getElementById("errorAccepter").innerHTML = "Vous devez accepter le traitement informatique de ce formulaire.";
//         check = false; // do not submit the form
        
//     }
//     else
//     {
//         document.getElementById("errorAccepter").innerHTML = "";
//     }
//     return check;
// }
