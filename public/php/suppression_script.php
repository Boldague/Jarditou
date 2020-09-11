<?php 

$id = $_GET["id"];
require "connexion_bdd.php"; 
$db = connexionBase(); 

// Requête de recupération de l'extension pour photo du produit
//--------------------------------------------------
$requete = "SELECT pro_photo FROM produits WHERE pro_id=".$id;
$result = $db->query($requete);
if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreurs[2]; 
    die("Erreur dans la requête");
}
//--------------------------------------------------

$produit = $result->fetch(PDO::FETCH_OBJ); // Affecte a $produit la premiere ligne du resultat sous forme de tableau d'objets.
$extension = $produit->pro_photo; // On recupère l'élément de la colonne(pro_photo) de la ligne recuperé.

// Requête de recupération de l'extension pour photo du produit
//--------------------------------------------------
$requete = 'DELETE FROM produits WHERE pro_id='.$id;
$result = $db->query($requete);
//--------------------------------------------------
if (!$result) // On teste si la requête retourne une ligne ou non
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreurs[2];
    die("Erreur dans la requête");
}
else // Si une ligne est supprimée alors on commence la suppression de l'image.
{
    if(($extension) == "png")
    {
        $pathImg = 'public/images/produits/png/'.$id.'.'.$extension;
        if(!file_exists($pathImg)) // On test si l'image exite dans le dossier png.
        {
                $pathImg = '../../'.$pathImg ; // On crée le chemin de l'image à supprimer.
                unlink($pathImg); // On la supprime.
        }
    }
    else if(($extension) == "jpg")
    {
        $pathImg = 'public/images/produits/jpg/'.$id.'.'.$extension;
        if(!file_exists($pathImg)) // On test si l'image exite dans le dossier jpg.
        {
                $pathImg = '../../'.$pathImg ; // On crée le chemin de l'image à supprimer.
                unlink($pathImg); // On la supprime.
        }
    }
    else
    {
        $pathImg = 'public/images/produits/'.$id.'.'.$extension;
        if(!file_exists($pathImg)) // On test si l'image exite dans un autre format que PNG OU JPG dans le dossier produits.
        {
            $pathImg = '../../'.$pathImg ; // On crée le chemin de l'image à supprimer.
            unlink($pathImg); // On la supprime.
        }
        else
        {
            echo "fichier non trouvé !! ";
        }
    }
    header("Location:../../tableau.php");
}
?>