<?php
if (file_exists("header.php") ) 
{
    include("header.php");
} 
else 
{
    // Erreur (à gérer)
    echo "Le header n'existe pas !!";
} 
$id = $_GET["id"];
$requete = "SELECT * FROM produits INNER JOIN categories ON produits.pro_cat_id = categories.cat_id WHERE pro_id=".$id;

$result = $db->query($requete);

if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
}

if ($result->rowCount() == 0) 
{
    // Pas d'enregistrement
    die("La table est vide");
}

// Renvoi de l'enregistrement sous forme d'un objet
$produit = $result->fetch(PDO::FETCH_OBJ);

$photo = $produit->pro_photo;
$libelle = $produit->pro_libelle;
$reference = $produit->pro_ref;
$prix = $produit->pro_prix;
$stock = $produit->pro_stock;
$description = $produit->pro_description;
$couleur = $produit->pro_couleur;
$bloque = $produit->pro_bloque;
$d_ajout = $produit->pro_d_ajout;
$d_modif = $produit->pro_d_modif;
$categorie = $produit->cat_nom;
?>

<div class="row d-flex text-center bg-dark mx-0 p-auto ">
    <div class=" col-12 h2 text-light text-center align-self-center">
        Modifier le produit
    </div>
</div>

<div>
<form class="mt-3" action="public/php/modification_script.php"  method="post" enctype="multipart/form-data" id="form" name="formulaire">
    <fieldset>
    <legend class="h2">Infos du produit</legend>
    <input type="hidden" class="form-control" value="<?php echo $id ;?>" name="id" id="id">

    <div class="form-group">
        <label for="nom" >Réfèrence :</label>
        <br>
        <input type="file" name="photo">
    </div>

    <div class="form-group">
        <label for="nom" >Réfèrence :</label>
        <input type="text" class="form-control" name="reference" id="reference" placeholder="<?php echo $reference ;?>">
    </div>
    <p id="errorreference" class="text-danger"></p>
    <div class="form-group">
        <label for="nom" >Libellé :</label>
        <input type="text" class="form-control" name="libelle" id="libelle" placeholder="<?php echo $libelle ;?>">
    </div>
    <p id="errorlibelle" class="text-danger"></p>
    <div class="form-group">
        <label for="question">Description :</label>
        <textarea class="form-control" name="description" id="description" placeholder="<?php echo$description ;?>" rows="3" ></textarea>
    </div>

    <div class="form-group">
        <label for="nom" >Prix :</label>
        <input type="text" class="form-control" name="prix" id="prix" placeholder="<?php echo $prix ;?>" >
    </div>
    <p id="errorprix" class="text-danger"></p>
    <div class="form-group">
        <label for="nom" >Stock :</label>
        <input type="text" class="form-control" name="stock" id="stock" placeholder="<?php echo $stock ;?>" >
    </div>
    <p id="errorstock" class="text-danger"></p>
    <div class="form-group">
        <label for="nom" >Couleur :</label>
        <input type="text" class="form-control" name="couleur" id="couleur" placeholder="<?php echo $couleur ;?>" >
    </div>
    <p id="errorcouleur" class="text-danger"></p>
<?php
$oui = "";
$non = "checked";
$mbloque = "Null";
if($bloque == 1)
{
    $oui = $non ;
    $non = "";
    $mbloque = $bloque;
}
?>

<input type="hidden" class="form-control" value="<?php echo $mbloque ;?>" name="mbloque" id="mbloque">

<div class="form-group d-flex flex-column">
    <label for="sexe">Produit bloqué :</label>
    <div class="form-check-inline mt-2" id="check">
        <input class="form-check-input" type="radio" name="bloque" id="Oui" value="1" <?php echo $oui ;?> >
        <label class="form-check-label" for="Féminin">Oui</label>
        <input class="form-check-input ml-3" type="radio" name="bloque" id="Non" value="Null" <?php echo $non ;?>>
        <label class="form-check-label" for="Masculin">Non</label>
    </div>
</div>

<?php
$tab = array("bmp","jpg","jpeg","png","tiff");
$posi = 0;
$selected= "";
?>
</fieldset>
<fieldset>
    <legend class="h2">Infos catégorie</legend>
<?php
$requete = "SELECT cat_id,cat_nom FROM categories";
$result = $db->query($requete);
if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    $tableauErreurs[2]; 
    die("Erreur dans la requête");
}
?>

<div class="form-group">
    <label for="categorie">Catégorie :</label>
    <select id="categorie" name="categorie" class="form-control">
    <?php
    $mcategorie = -1;
    while ($categorieProduit = $result->fetch(PDO::FETCH_OBJ))
    {
        $selected= "";
        if($categorie == $categorieProduit->cat_nom)
        {
            $selected = "selected";
            $mcategorie = $categorieProduit->cat_id;
        }
        echo '<option value="'.$categorieProduit->cat_id.'" '.$selected.'>'.$categorieProduit->cat_nom.'</option>';
    }
    ?>
    </select> 
    <input type="hidden" class="form-control" value="<?php echo $mcategorie ;?>" name="mcategorie" id="mcategorie">
</div>
<div class="row d-flex justify-content-center justify-content-md-start mx-0 form-group">
    <a href= <?php echo '"Detail.php?id='.$id.'"'?> role="button" class="btn">
        <img class="img-fluid d-block m-auto w-50" src="public/images/icons/return_black_64px.png " alt="edit" title="edit">
    </a>
    <button if="submit" class="btn" type="submit">
        <img class="img-fluid d-block m-auto w-50" src="public/images/icons/checkmark_black_64px.png " alt="edit" title="edit">
    </button>
    <button if="submit" class="btn" type="reset">
        <img class="img-fluid d-block m-auto w-50" src="public/images/icons/supp_black_64px.png " alt="edit" title="edit">
    </button>
</div>
</form>

<script src="public/js/verifModif.js"></script>
<?php
if (file_exists("footer.php") ) 
{
include("footer.php");
} 
else 
{
// Erreur (à gérer)
echo "Le footer n'existe pas !!";
} 
?>

