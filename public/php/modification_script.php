<?php
require "connexion_bdd.php";
$db = connexionBase();

// Création des variables
//--------------------------------------------------
$id = $_POST["id"];
$vUpdate = false; // Maj est faisable ou non (init à false).
$verif = true; 
$tabstmt1 = array(); // Création de tableau pour le premier paramètre de $stmt->bindParam(paramètre 1, paramètre 2, paramètre 3).
(object)$tabstmt2 = array(); // Création de tableau pour le second paramètre (formater en Objet) de $stmt->bindParam(paramètre 1, paramètre 2, paramètre 3).
(object)$tabstmt3 = array(); // Création de tableau pour le troisieme paramètre (formater en Objet) de $stmt->bindParam(paramètre 1, paramètre 2, paramètre 3).
$erreurMessage = "Aucun Update de fait"; // Message d'erreur de base.
$update = 'UPDATE produits'; // Initialisation l'UPDATE de la requête sans besoin de concaténation.
$set = 'SET '; // Initialisation de la concaténation pour le SET de la requête de Maj.
$where = 'WHERE pro_id = :id'; // Conditon WHERE de la requete sans besoin de concaténation.
//--------------------------------------------------

// Ajout des parametres pour l'id à la fin des 3 tableaux (tableau qui etait vide)
//--------------------------------------------------
array_push($tabstmt1, ":id");
array_push($tabstmt2, $id);
array_push($tabstmt3, PDO::PARAM_INT);
//--------------------------------------------------

if (!empty($_POST["reference"])) // On teste si la ref est vide ou non.
{
    $reference = $_POST["reference"]; // On recupere la valeur passée par le $_POST.
    $set = $set." pro_ref = :reference,"; // On concatène pour ajouter au SET .

    // Ajout des parametres pour la ref à la fin des 3 tableaux. 
    // On le fait à chaque fois qu'une valeur doit etre modifié avec la requête d'UPDATE.
    //--------------------------------------------------
    array_push($tabstmt1, ":reference");
    array_push($tabstmt2, $reference);
    array_push($tabstmt3, PDO::PARAM_STR);
    //--------------------------------------------------

    $vUpdate = true; // Il y a modification d'une valeur donc la variable passe à true.
}
if (!empty($_POST["libelle"]))
{
    $libelle = $_POST["libelle"];
    $set = $set." pro_libelle = :libelle ,";
    array_push($tabstmt1, ":libelle");
    array_push($tabstmt2, $libelle);
    array_push($tabstmt3, PDO::PARAM_STR);
    $vUpdate = true;
}
if (!empty($_POST["description"]))
{
    $description = $_POST["description"];
    $set = $set." pro_description = :descrip,";
    array_push($tabstmt1, ":descrip");
    array_push($tabstmt2, $description);
    array_push($tabstmt3, PDO::PARAM_STR);
    $vUpdate = true;
}
if (!empty($_POST["prix"]))
{
    $erreurMessage = "";
    $prix = $_POST["prix"];
    if(!preg_match('/^[0-9]{1,}[,.]{0,1}[0-9]{1,2}$/',$prix))
    {
        $erreurMessage = $erreurMessage."Erreur RegEx: le prix n'est pas au bon format. <br>";
        $verif = false;
    }
    $set = $set." pro_prix = :prix,";
    array_push($tabstmt1, ":prix");
    array_push($tabstmt2, $prix);
    array_push($tabstmt3, PDO::PARAM_INT);
    $vUpdate = true;
}
if (!empty($_POST["stock"]))
{
    $stock = $_POST["stock"];
    if(!preg_match('/^[0-9]+$/', $stock))
    {
        $erreurMessage = $erreurMessage."Erreur RegEx: la quantité doit être du numerique. <br>";
        $verif = false;
    }
    $set = $set." pro_stock = :stock,";
    array_push($tabstmt1, ":stock");
    array_push($tabstmt2, $stock);
    array_push($tabstmt3, PDO::PARAM_INT);
    $vUpdate = true;
}
if (!empty($_POST["couleur"]))
{
    $couleur = $_POST["couleur"];
    if(!preg_match('/^[A-Za-z]{2,}+$/', $couleur))
    {
        $erreurMessage = $erreurMessage."Erreur RegEx: la couleur doit être en alphabetique. <br>";
        $verif = false;
    }
    $set = $set. " pro_couleur = '".$couleur."',";
    $set = $set." pro_couleur = :couleur,";
    array_push($tabstmt1, ":couleur");
    array_push($tabstmt2, $couleur);
    array_push($tabstmt3, PDO::PARAM_STR);
    $vUpdate = true;
}
if (!empty($_FILES["photo"]["name"]))
{
    $photo = $_FILES["photo"];
    $vUpdate = true;
    $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/x-png", "image/tiff");
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["photo"]["tmp_name"]);
    finfo_close($finfo);
    if (in_array($mimetype, $aMimeTypes))
    {
        $extension = substr(strrchr($_FILES["photo"]["name"], "."), 1);
        $set = $set. " pro_photo = :extension,";
        array_push($tabstmt1, ":extension");
        array_push($tabstmt2, $extension);
        array_push($tabstmt3,  PDO::PARAM_STR);
        $tab = array("bmp","jpg","jpeg","png","x-png","tiff");
        if($extension == "png")
        {
            $pathImg = '../../public/images/produits/png/'.$_POST["id"].'.'.$extension;
        }
        else if($extension == "jpg")
        {
            $pathImg = '../../public/images/produits/jpg/'.$_POST["id"].'.'.$extension;
        }
        else
        {
            $pathImg = '../../public/images/produits/'.$_POST["id"].'.'.$extension;
        }
        move_uploaded_file($_FILES["photo"]["tmp_name"], $pathImg);
    } 
    else 
    {
        echo "Type de fichier non autorisé <br>";    
        exit;
    } 
}
if ((!empty($_POST["categorie"])) && ($_POST["mcategorie"] != $_POST["categorie"]))
{
    $categorie = $_POST["categorie"];
    $set = $set. " pro_cat_id = :categorie,";
    array_push($tabstmt1, ":categorie");
    array_push($tabstmt2, $categorie);
    array_push($tabstmt3, PDO::PARAM_INT);
    $vUpdate = true;
}
if ($_POST["mbloque"] != $_POST["bloque"])
{
    $bloque = $_POST["bloque"];
    $set = $set. " pro_bloque = :bloque,";
    $stmt->bindParam(":bloque", $bloque, PDO::PARAM_INT);
    $vUpdate = true;
}
if($verif) // Si il n'y a pas d'ereur de Regex on passe au test de champ modifié ou pas.
{
    if($vUpdate) // Si il y a un champ à modifié on pas à la maj.
    {
        $dateModif = date('Y-m-d');
        $set = $set. " pro_d_modif = :dateMofid,";
        array_push($tabstmt1,  ":dateMofid");
        array_push($tabstmt2,  $dateModif);
        array_push($tabstmt3,   PDO::PARAM_STR);
        $set = substr($set, 0, -1); // On enleve la dernière "," de la variable $set.
        $query = $update." ".$set." ".$where; // On concatène les variables $update, $set et $where pour avir la requête à exécuter.
        $stmt = $db->prepare($query); // Execution de la requête avec stockage du resultat sous forme d'objet.
        $count = count($tabstmt1); // Récuperation de la taille d'un des tableaux.

        // On boucle sur la du tableau pour créer chaque bindParam de la requête préparé.
        //--------------------------------------------------
        for($i = 0; $i <$count; $i++)
        {
            $stmt->bindParam($tabstmt1[$i], $tabstmt2[$i], $tabstmt3[$i]); // le bindParam se fait avec les données recupé dans chaqu'un des tableaux à la position $i de la boucle.
        }
        //--------------------------------------------------

        // Requête préparé permettant de verifier si il n'existe pas déjà un produit avec la même ref.
        //--------------------------------------------------
        $stmt = $db->prepare('SELECT pro_id FROM produits WHERE pro_ref =:reference');
        $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
        $stmt->execute();
        //--------------------------------------------------

        if (!$stmt->fetch(PDO::FETCH_OBJ))
        {
            $stmt->execute();
            header('Location:../../Detail.php?id='.$_POST["id"]);
        }
        else
        {
            echo "La référence existe déja.";
        }
    }
    else
    {
        echo "Il n'y a rien qui a été modifié.";
    }
}
else
{
    
    echo $erreurMessage;
}

?>