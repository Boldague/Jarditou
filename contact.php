<?php
    if (file_exists("header.php") ) 
    {
        include("header.php");
    } 
    else 
    {
         // Erreur (à gérer)
        echo "message d'erreur !!";
    } 
?>
<div class="row d-flex text-center bg-dark mx-0 p-auto ">
    <div class="col-3 d-flex justify-content-start">
    </div>
    <div class=" col-6 h2 text-light text-center align-self-center">
      Nous contacter
    </div>
    <div class="col-3 ">
    </div>
</div>
    <!-- Header -->
      <p class="my-3 small">* Ces zones sont obligatoires</p>
      <form action="public/php/formu.php" method="POST" id="form" name="form">
        <fieldset>
          <legend class="h2">Vos coordonées</legend>
          
          <div class="form-group">
            <label for="nom" >Nom : *</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Veuillez saisir votre nom">
          </div>
          <p id="errornom" class="text-danger"></p>

          <div class="form-group">
            <label for="prénom">Prénom : *</label>
            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Veuillez saisir votre prénom">
          </div>
          <p id="errorprenom" class="text-danger"></p>

          <div class="form-group d-flex flex-column">
            <label for="sexe">Sexe : *</label>
            <div class="form-check-inline mt-2" id="check">
              <input class="form-check-input" type="radio" name="radio" id="Féminin" value="Féminin">
              <label class="form-check-label" for="Féminin">Féminin</label>
              <input class="form-check-input ml-3" type="radio" name="radio" id="Masculin" value="Masculin">
              <label class="form-check-label" for="Masculin">Masculin</label>
            </div>
          </div>
          <p id="errorradio" class="text-danger"></p>

          <div class="form-group">
            <label for="date-input">Date de naissance : *</label>
            <input class="form-control" type="text" name="datenaissance" id="datenaissance" >
          </div>
          <p id="errordatenaissance" class="text-danger"></p>

          <div class="form-group">
            <label for="codepostal">Code postal : *</label>
            <input type="text" class="form-control" name="codepostal" id="codepostal" >
          </div>
          <p id="errorcodepostal" class="text-danger"></p>

          <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" class="form-control" name="adresse" id="adresse">
          </div>
          
          <div class="form-group">
            <label for="ville">Ville :</label>
            <input type="text" class="form-control" name="ville" id="ville" >
          </div>

          <div class="form-group">
            <label for="mail">E-mail : *</label>
            <input type="text" class="form-control" name="mail" id="mail" >
          </div>
          <p id="errormail" class="text-danger"></p>

        </fieldset>

        <fieldset>
          <legend class="h2">Votre demande</legend>
          <div class="form-group">
            <label for="selection">Sujet : *</label>
            <select id="selection" name="selection" class="form-control">
              <option value="">Veuillez sélectionner un sujet</option>
              <option value="Mes commandes" >Mes commandes</option>
              <option value="Question sur un produit">Question sur un produit</option>
              <option value="Réclamation">Réclamation</option>
              <option value="Autres">Autres</option>
            </select>
          </div>

          <div class="form-group">
            <label for="question">Votre question : *</label>
            <textarea class="form-control" name="question" id="question" rows="3" ></textarea>
          </div>
          <p id="errorquestion" class="text-danger"></p>

          <div class="form-check form-check-inline">
            <label for="accepter" class="form-check-label">
              <input class="form-check-input" type="checkbox" name="accepter" id="accepter" value="ok" >J'accepte le traitement informatique de ce formulaire. *
            </label>
          </div>
          <p id="erroraccepter" class="text-danger"></p>

          <div class="form-group mt-3">
            <button if="submit" class="btn btn-dark" type="submit">Envoyer</button>
            <button class="btn btn-dark" type="reset">Annuler</button>
          </div>
        </fieldset>
      </form>
<script src="public/js/verifForm.js"></script>
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