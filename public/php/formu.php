<?php
// Création des variables
//--------------------------------------------------
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$radio = $_POST["radio"];
$codepostal = $_POST["codepostal"];
$datenaissance = $_POST["datenaissance"];
$mail = $_POST["mail"];
$selection = $_POST["selection"];
$question = $_POST["question"];
$accepter = $_POST["accepter"];
$ville = $_POST["ville"];
$adresse = $_POST["adresse"];
//--------------------------------------------------

// verification si les champs sont vides
if (isset($nom) && isset($prenom) && isset($radio) && isset($codepostal ) && isset($datenaissance) && isset($mail) && !empty($selection) && isset($question) && isset($accepter))
{
    $tabFormu = [$nom,$prenom,$codepostal ,$datenaissance,$mail,$radio,$selection,$adresse,$ville, $question, $accepter]; // création d'un tableau avec les variables à l'interieur.
    $tabFormuMessage = ["nom","prenom","code postal","date de naissance","L'Email"];
    $position = 0; // Init de la position pour les messages.
    foreach($tabFormu as $value)
    {
        if((!preg_match('/^[A-Za-z]+$/',$value)) && ($position == 0 || $position == 1)) // On teste la RegEx et si la position sur quel variable on effectue la RegEx.
        {
            echo "Erreur RegEx: ".$tabFormuMessage[$position].' doit comporter au moins 1 caractère. <br>'; // Message d'erreur en recuperant le debut dans le tableau message à la possition indiqué.
        }
        else if((!preg_match('/^[0-9]{5}$/', $value)) && ($position == 2))
        {
            echo "Erreur RegEx: ".$tabFormuMessage[$position].' doit comporter 5 caractères numériques. <br>';
        }
        else if((!preg_match('/^([0-2][0-9]|[3][0-1])\/([0][1-9]|[1][0-2])\/[0-2][0-9]{3}$/', $value)) && ($position == 3))
        {
            echo "Erreur RegEx: ".$tabFormuMessage[$position].' doit etre au format dd/mm/aaaa. <br>';
        }
        else if((!preg_match('/^[A-Za-z0-9._-]+@[a-z0-9\d._-]{2,}.[a-z]{2,4}+$/', $value)) && ($position == 4))
        {
            echo "Erreur RegEx: ".$tabFormuMessage[$position].' doit etre de format "(Utilisateur)@(Nom de domaine).(extension)", par exemple "nom.prenom@site.fr". <br>';
        }
        else
        {
            echo $value."<br>"; // On affiche chaque champ ou il n'y a pas d'erreur de RegEx.
        }
        $position++;
    }
}
else 
{
    // Message d'erreur si au moins un champs important est vide.
    echo "Les champs avec * sont obligatoires. <br>";
}

?>