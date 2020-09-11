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
    echo $tableauErreurs[2]; 
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
$tab = array("bmp","jpg","jpeg","png","x-png","tiff");
$dossierImage = "png";
$dossierImage = "jpg";
for($i = 0; $i < count($tab);$i++)
{
    if(!file_exists('public/images/produits/'.$dossierImage.'/'.$id .'.'.$tab[$i]))
    {
    $pathImg = 'public/images/produits/'.$dossierImage.'/erreurImage.'.$dossierImage;
    }
    else
    {
    $pathImg = 'public/images/produits/'.$dossierImage.'/'.$id .'.'.$tab[$i];
    break;
    }
}
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
<div class="row d-flex  text-center bg-dark mx-0 p-auto ">
    <div class="col-3 d-flex justify-content-start ">
    </div>
    <div class=" col-6 h2 text-light text-center align-self-center">
    Le détail
    </div>
    <div class="col-3 d-none d-md-flex justify-content-end">
            <a <?php echo 'href="modification.php?id='.$id.' "role="button" class="btn btn-white mx-1"';?>>
                <img class="img-fluid d-block m-auto w-50" src="public/images/icons/edit_white_64px.png " alt="edit" title="edit">
            </a>
            <button class="btn btn-white mx-1" type="reset" onclick="validation(<?php echo $id ;?>)" name="supprimer">
                <img class="img-fluid d-block m-auto w-50" src="public/images/icons/delete_white_64px.png " alt="edit" title="edit">
            </button>
    </div>
</div>
<form action="#" method="POST" id="form" name="formulaire">
<div class="row mx-0 mb-0 flex-column">
    <div class="row d-flex mx-0">
    <div class="col-12 col-md-4  mt-2 mt-lg-0">
            <fieldset>
            <legend class="h2 pt-2">Description du produit</legend>
            <div class="form-group">
            <label for="question">Image :</label>
            <img class="img-fluid d-block m-auto" src="<?php echo $pathImg ;?>" alt="<?php echo $libelle ;?>" title="<?php echo $libelle;?>">
            </div>
            <div class="form-group">
            <label for="question">Description :</label>
            <textarea class="form-control" placeholder="<?php echo $description ;?>" rows="10" style="resize:none" readonly></textarea>
            </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-8">
            <fieldset>
            <legend class="h2 pt-2">Infos du produit</legend>
            <div class="form-group">
            <label for="nom" >Réfèrence :</label>
            <input type="text" class="form-control" placeholder="<?php echo $reference ;?>" readonly>
            </div>
            <div class="form-group">
            <label for="nom" >Libellé :</label>
            <input type="text" class="form-control" placeholder="<?php echo $libelle ;?>" readonly>
            </div>
            
            <div class="form-group">
            <label for="nom" >Prix :</label>
            <input type="text" class="form-control" placeholder="<?php echo $prix ;?>" readonly>
            </div>
            <div class="form-group">
            <label for="nom" >Stock :</label>
            <input type="text" class="form-control" placeholder="<?php echo $stock ;?>" readonly>
            </div>
            <div class="form-group">
            <label for="nom" >Couleur :</label>
            <input type="text" class="form-control" placeholder="<?php echo $couleur ;?>" readonly>
            </div>
            <?php
            $oui = "";
            $non = "checked";

            if($bloque == 1)
            {
            $oui = $non ;
            $non = "";
            }
            ?>
            <div class="form-group d-flex flex-column">
            <label for="sexe">Produit bloqué :</label>
            <div class="form-check-inline mt-2" id="check">
                <input class="form-check-input" type="radio" name="bloque" id="Oui" value="1" <?php echo $oui ;?> disabled>
                <label class="form-check-label" for="Féminin">Oui</label>
                <input class="form-check-input ml-3" type="radio" name="bloque" id="Non" value="Null" <?php echo $non ;?> disabled>
                <label class="form-check-label" for="Masculin">Non</label>
            </div>
            </div>
            <div class="form-group">
            <label for="nom" >Date d'ajout :</label>
            <input type="text" class="form-control" placeholder="<?php echo $d_ajout ;?>" readonly>
            </div>
            <div class="form-group">
            <label for="nom" >Date de modification :</label>
            <input type="text" class="form-control" placeholder="<?php echo $d_modif ;?>" readonly>
            </div>
            </fieldset>
            <fieldset>
                <legend class="h2">Infos catégorie</legend>
                <div class="form-group">
                    <label for="nom" >Catégorie :</label>
                    <input type="text" class="form-control" placeholder="<?php echo $categorie ;?>" readonly>
                </div>
                
            </fieldset>
        </div>
        
    </div>
    
    <div class="row d-flex d-md-none justify-content-center justify-content-md-end mx-0 form-group">
        <a <?php echo 'href="modification.php?id='.$id.' "role="button" class="btn btn-white mx-1"';?>>
            <img class="img-fluid d-block m-auto w-50" src="public/images/icons/edit_black_64px.png " alt="edit" title="edit">
        </a>
        <button class="btn btn-white mx-1" type="reset" onclick="validation(<?php echo $id ;?>)" name="supprimer">
            <img class="img-fluid d-block m-auto w-50" src="public/images/icons/delete_black_64px.png " alt="edit" title="edit">
        </button>
    </div>
    </div>
</form>
<script>
function validation(id)
{
    if (confirm("Vous désirez supprimer le produit ?")) 
    {
        
        window.location.href="public/php/suppression_script.php?id="+id;
    }
    else 
    {
        window.location.href="tableau.php";
    }
}
</script>

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

