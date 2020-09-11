<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php
      require "public/php/connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
      $db = connexionBase(); // Appel de la fonction de connexion
    ?>
    <title>Jarditou HTML</title>
  </head>
  <body>
    <!-- Header -->
    <div class="container-fluid">
      <!-- classe(ligne, masquer en XS, afficher en MD flexbox) -->
      <div class="row d-none d-md-flex">
        <!-- class(Col de 2, adaptabilité d'image) -->
        <img class="col-2 img-fluid" src="public/images/logo/jarditou_logo.png " alt="Logo Jarditou" title="Logo Jarditou">
        <!-- class(Col restantes, alignement à droite, style titre h1, Flex alignement ) -->
        <p class="col-10 text-right h1 align-self-center pr-5">Tout le jardin</p>
      </div>
      <!-- Nav -->
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">Jarditou.com</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="Index.php">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Tableau.php">Produits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contact.php">Contact</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-md-0 " >
            <input class="form-control mr-md-2" type="text" placeholder="Votre promotion">
            <button class="btn my-2 my-md-0" type="submit">
            <img class="img-fluid d-block m-auto w-50" src="public/images/icons/search_black_64px.png " alt="edit" title="edit">
            </button>
          </form>
        </div>
      </nav>
      <!-- ban promotion class(adaptabilité d'image, largeur 100%)  -->
      <img class="img-fluid w-100" src="public/images/logo/promotion.jpg" alt="promotion" title="promotion" id="promotion">