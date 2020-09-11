document.querySelector('#form').onsubmit = function checkForm()
{
    //e.preventDefault();
    // Création des variables
    //--------------------------------------------------
    var tabName = new Array("reference","libelle","prix"); // Tableau avec les noms recherchés.
    var tabFiltre = new Array('^[\\w.]{3,}$','^[0-9A-Za-z]{3,}$','^[0-9]{1,}[,.]{0,1}[0-9]{0,2}$'); // Tableau avec les RegEx.
    var tabError = new Array
    ("La reference doit avoir au moins 3 caractères.",
    "Le libelle doit avoir au moins 3 caractères.",
    "Le prix doit être un nombre décimal"); // Tableau avec les messages d'erreur.
    var check = true;
    //--------------------------------------------------

    // this represente l'objet avec le focus donc ici le formulaire
    for (i=0; i < this.length; i++) // Ne sert que si les requiered ne sont pas utilisés.
    {
        var name = this.length.elements[i].name; // On récupère le nom de l'élément du formumaire.
        var value = this.length.elements[i].value; // On récupère la valeur de l'élément du formumaire.
        if(VerifChampsNull(true,value)) // la fonction ne sert vraiment que si les requiered ne sont pas utilisés.
        {
            if(tabName.indexOf(name) != -1) // On teste savoir si le nom de l'élément est dans le tableau des noms.
            {  
                var filtre = new RegExp(tabFiltre[tabName.indexOf(name)]); // On crée le filtre vec en param le tableau de RegEx à la position.
                var estFiltre = filtre.test(value); // On teste la RegEx.
                if(!estFiltre) // Si le test de la RegEx est à false, on affiche le message erreur.
                {
                    document.getElementById(("error"+ name)).innerHTML = tabError[tabName.indexOf(name)]; // L'élément avec le nom "error + (nom)" recoit le message du tableau erreur à l'index du nom.
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

// Fonction pour gérer l'autorisation de champs null.
// 1er param = true ou false (On autorise ou pas les champs null).
// 2eme param = la valeur du champ.
function VerifChampsNull(nullAutorise,value)
{
    var estAutorise = false; // Init à false de la variable à retourner.
    if(nullAutorise == false && value != "") // On teste si l'autorisation de null est à false. si c'est le cas la valeur doit être null pour renvoyer true.
    {
        estAutorise = true; // On autorise l'entrée pour les tests.
    }
    else if(nullAutorise == true) // On teste si l'autorisation de null est à true. Si c'est le cas pas besoin de tester la valeur du champs.
    {
        estAutorise = true; // On autorise l'entrée pour les tests.
    }
    return estAutorise; // On retourne si on à le droit ou pas de rentrer.
}
