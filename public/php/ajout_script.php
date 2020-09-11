<?php
require "connexion_bdd.php";
$db = connexionBase();

$requete = "SELECT MAX(pro_id) as max_pro_id FROM produits"; // On cherche l'id le plus grand dans la base pour pouvoir renommer l'image.
$result = $db->query($requete);
if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreurs[2]; 
    die("Erreur dans la requête");
}
$produit = $result->fetch(PDO::FETCH_OBJ); // Renvoi de l'enregistrement sous forme d'un objet
$id = ($produit->max_pro_id) + 1; // On ajoute 1 à l'id retourné 

// Création des variables
//--------------------------------------------------
$reference = $_POST["reference"];
$libelle = $_POST["libelle"];
$description = $_POST["description"];
$prix = $_POST["prix"];
$stock = $_POST["stock"];
$texteMinuscule = strtolower($_POST["couleur"]); // Création de la variable qui va stocker le texte en minuscule.
$couleur = ucwords($texteMinuscule); // Création de la variable couleur avec en majuscule la première lettre.
$bloque = $_POST["bloque"];
$extension = null;
$categorie = $_POST["categorie"];
$dateAjout = date('Y-m-d');
// -------------------------------------------------

if (!empty($_FILES["photo"]["name"])) // On teste si le nom de la photo dans le $_FILES[] est vide ou non
{
    $photo = $_FILES["photo"];
    $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/x-png", "image/tiff"); // On met les types autorisés dans un tableau (ici pour une image)
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // On extrait le type du fichier via l'extension FILE_INFO 
    $mimetype = finfo_file($finfo, $_FILES["photo"]["tmp_name"]); // On récupère le MineType du fichier tempo
    finfo_close($finfo);
    if (in_array($mimetype, $aMimeTypes)) // On teste savoir si le MineType est das les MineType autorisés
    {
        //Le type est parmi ceux autorisés, donc OK, on va pouvoir déplacer et renommer le fichier
        $extension = substr(strrchr($_FILES["photo"]["name"], "."), 1); // On récupère l'extensiondu fichier
        $tab = array("bmp","jpg","jpeg","png","x-png","tiff"); // Tableau d'extension de fichier
        if($extension == "png") // On teste si c'est un png ou jpg (il y a seulement ces deux dossiers dans images)
        {
            $pathImg = '../../public/images/produits/png/'.$id.'.'.$extension;
        }
        else if($extension == "jpg")
        {
            $pathImg = '../../public/images/produits/jpg/'.$id.'.'.$extension;
        }
        move_uploaded_file($_FILES["photo"]["tmp_name"], $pathImg); // On déplace l'image temporaire vers la destination avec le nouveau nom.
    } 
    else 
    {
        // Le type n'est pas autorisé, donc ERREUR
        echo "Type de fichier non autorisé <br>";
    } 
}
// verification si les champs sont vides
if (isset($reference) && isset($libelle) && isset($description) && isset($prix) && isset($stock) && isset($couleur) && isset($categorie)) 
{
    $verif = true; // variable d'autorisation pour envoyer le formulaire init à true.
    if(!preg_match('/^[0-9]{1,}+[,.]{0,1}[0-9]{0,2}$/',$prix)) // verification RegEx du prix ([0-9]{1,} = au moins 1 chiffre avant la virgule, +[,.]{0,1} = , ou . ou rien et [0-9]{0,2} = 0 à 2 chiffres après la virgule)
    {
        echo "Erreur RegEx: le prix n'est pas au bon format, elle doit être en numerique. <br>";
        $verif = false; // variable d'autorisation passe à false si la RegEx n'est pas bonne.
    }
    if(!preg_match('/^[0-9]+$/', $stock)) // verification RegEx du stock ([0-9]+ = au moins 1 chiffre dans la chaine de caractère).
    {
        echo "Erreur RegEx: la quantité doit être en numerique et doit contenir au moins un chiffre. <br>";
        $verif = false;
    }
    if(!preg_match('/^[A-Za-z]+$/', $couleur)) // verification RegEx de la couleur ([A-Za-z]+ = au moins un caractère alphabétique dans la chaine).
    {
        echo "Erreur RegEx: la couleur doit avoir au moins 1 caractère alphabétique. <br>";
        $verif = false;
    }

    if ($verif) // On teste la variable d'autorisation savoir si elle est toujours à true.
    {
        // Requête préparé permettant de verifier si il n'existe pas déjà un produit avec la même ref, le même libellé et la même couleur.
        //--------------------------------------------------
        $stmt = $db->prepare('SELECT pro_id FROM produits WHERE pro_ref =:reference AND pro_libelle =:libelle AND pro_couleur =:couleur');
        $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
        $stmt->bindParam(":libelle", $libelle, PDO::PARAM_STR);
        $stmt->bindParam(":couleur", $couleur, PDO::PARAM_STR);
        $stmt->execute();
        //--------------------------------------------------

        if (!$stmt->fetch(PDO::FETCH_OBJ)) // Si il n'y a aucun résultat de renvoyé alors on ajoute le produit.
        {
            // Requête préparé permettant d'ajouter le nouveau produit dans la base de données.
            //--------------------------------------------------
            $stmt = $db->prepare('INSERT INTO produits (pro_id, pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque) 
                                    VALUES(:id, :categorie, :reference, :libelle, :descrip, :prix, :stock, :couleur, :extension, :dateAjout, :bloque)');
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":categorie", $categorie, PDO::PARAM_INT);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $stmt->bindParam(":libelle", $libelle, PDO::PARAM_STR);
            $stmt->bindParam(":descrip", $description, PDO::PARAM_STR);
            $stmt->bindParam(":prix", $prix, PDO::PARAM_INT);
            $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
            $stmt->bindParam(":couleur", $couleur, PDO::PARAM_STR);
            $stmt->bindParam(":extension", $extension, PDO::PARAM_STR);
            $stmt->bindParam(":dateAjout", $dateAjout, PDO::PARAM_STR);
            $stmt->bindParam(":bloque", $bloque, PDO::PARAM_INT);
            $stmt->execute();
            //--------------------------------------------------

            header("Location:../../detail.php?id=".$id); // on redirige vers la page de détail du produit une fois l'ajout du produit éffectué.
        } 
        else 
        {
            echo '<br>Votre produit existe déjà !!';
        }
    }
}
else 
{
    // Les champs sont vide, donc ERREUR
    echo "Les champs avec * sont obligatoires pour pouvoir créer un produit. <br>";
}
?>