document.querySelector('#form').onsubmit = function checkForm(e)
{
    //e.preventDefault();
    var tabName = new Array("reference","libelle","prix","stock","couleur");
    var tabFiltre = new Array('^[\\w.]{3,}$','^[0-9A-Za-z]{3,}$','^[0-9]{1,}[,.]{0,1}[0-9]{0,2}$','^[\\d]$','^[0-9A-Za-z]{2,}$');
    var tabError = new Array
    ("La reference doit avoir au moins 3 caracteres.",
    "Le libelle doit avoir au moins 3 caracteres.",
    "Le prix doit etre un nombre décimal",
    "Le stock doit etre un nombre décimal",
    "La couleur doit avoir au moins 2 caracteres alphabétique.");
    var check = true;
    for (i=0; i < this.length; i++) 
    {
        var name = this.elements[i].name;
        var value = this.elements[i].value;
        if(VerifChampsNull(false,value))
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
