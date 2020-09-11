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
?>
<div class="row d-flex text-center bg-dark mx-0 p-auto ">
    <div class=" col-12 h2 text-light text-center align-self-center">
        Nouveau produit
    </div>
</div>
<div >
<p class="my-3 small">* Ces zones sont obligatoires</p>
<form class="mt-3" action="public/php/ajout_script.php" method="POST" id="form" enctype="multipart/form-data" name="formulaire">
    <fieldset>
    <legend class="h2">Infos du produit</legend>

<div class="form-group">
        <label for="reference" >Réfèrence : *</label>
        <input type="text" class="form-control" name="reference" id="reference" required>
    </div>
    <p id="errorreference" class="text-danger"></p>
<div class="form-group">
    <label for="libelle" >Libellé : *</label>
    <input type="text" class="form-control" name="libelle" id="libelle" required>
    </div>
    <p id="errorlibelle" class="text-danger"></p>
<div class="form-group">
    <label for="description">Description : </label>
    <textarea class="form-control" name="description" id="description" rows="3" style="resize:none"></textarea>
    </div>
<div class="form-group">
    <label for="prix" >Prix : *</label>
    <input type="text" class="form-control" name="prix" id="prix" required >
    </div>
    <p id="errorprix" class="text-danger"></p>
<div class="form-group">
    <label for="stock" >Stock : </label>
    <input type="text" class="form-control" name="stock" id="stock">
    </div>
<div class="form-group">
    <label for="couleur" >Couleur : </label>
    <input type="text" class="form-control" name="couleur" id="couleur">
    </div>

<div class="form-group d-flex flex-column">
    <label for="bloque">Produit bloqué :</label>
    <div class="form-check-inline mt-2" id="check">
        <input class="form-check-input" type="radio" name="bloque" id="Oui" value="1">
        <label class="form-check-label" for="Oui">Oui</label>
        <input class="form-check-input ml-3" type="radio" name="bloque" id="Non" value="Null" checked>
        <label class="form-check-label" for="Non">Non</label>
    </div>
    </div>
    <div class="form-group">
        <label for="nom" >Image : </label>
        <br>
        <input type="file" name="photo">
    </div>
</fieldset>
    <fieldset>
    <legend class="h2">Infos catégorie</legend>
<?php
    $requete = "SELECT cat_id,cat_nom FROM categories";
    $result = $db->query($requete);
    if (!$result) 
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreurs[2]; 
        die("Erreur dans la requête");
    }
?>
<!-- Renvoi de l'enregistrement sous forme d'un objet -->
<div class="form-group">
    <label for="categorie">Catégorie : *</label>
    <select id="categorie" name="categorie" class="form-control" >
    <option value="">Veuillez sélectionner une catégorie</option>
    <?php
    while ($categorieProduit = $result->fetch(PDO::FETCH_OBJ))
    {
        echo '<option value="'.$categorieProduit->cat_id.'">'.$categorieProduit->cat_nom.'</option>';
    }
    ?>
</select> </div>
    <p id="errorSelection" class="text-danger"></p>
    

<div class="row d-flex justify-content-center justify-content-md-start mx-0 form-group">
    <button if="submit" class="btn" type="submit">
        <img class="img-fluid d-block m-auto w-50" src="public/images/icons/checkmark_black_64px.png " alt="edit" title="edit">
    </button>
    <button if="submit" class="btn" type="reset">
        <img class="img-fluid d-block m-auto w-50" src="public/images/icons/supp_black_64px.png " alt="edit" title="edit">
    </button>
</div>
</form>



<script src="public/js/verifAjout.js"></script>
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