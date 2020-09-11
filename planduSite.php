<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Jarditou HTML</title>
  </head>
  <body>
    <!-- Header -->
    <div class="container-fluid">
      <!-- classe(ligne, masquer en XS, afficher en MD flexbox) -->
      <div class="row d-none d-md-flex">
        <!-- class(Col de 2, adaptabilité d'image) -->
        <img class="col-2 img-fluid" src="src/images/jarditou_logo.jpg " alt="Logo Jarditou" title="Logo Jarditou">
        <!-- class(Col restantes, alignement à droite, style titre h2, Flex alignement ) -->
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
            <li class="nav-item">
              <a class="nav-link" href="Index.html">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Tableau.html">Tableau</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contact.html">Contact</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-md-0 " >
            <input class="form-control mr-md-2" type="text" placeholder="Votre promotion">
            <button class="btn btn-outline-success my-2 my-md-0" type="submit">Recherche</button>
          </form>
        </div>
      </nav>

      <nav class="nav navbar mt-2 rounded h4 ">
        <div class="navbar">
          <ul class="navbar-nav mr-auto  mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark" href="Index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Cours</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="Index.html#entreprise">L'entreprise</a>
                <a class="dropdown-item" href="Index.html#qualite">Qualité</a>
                <a class="dropdown-item" href="Index.html#devis">Devis gratuit</a>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-dark" href="Tableau.html">Tableau</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="Contact.html">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark" href="MentionL.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Mentions légales</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="MentionL.html#droit">Droit d'accès</a>
                <a class="dropdown-item" href="MentionL.html#cookies">Utilisation des cookies</a>
                <a class="dropdown-item" href="MentionL.html#droitsauteur">Respect des droits d'auteur</a>
                <a  class="dropdown-item" href="MentionL.html#vente">Vente de produits phytosanitaires</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="Horaires.html">Horaires</a>
            </li>
          </ul>
        </div>
      </nav>

      <nav class="nav navbar-expand mt-2 navbar-dark bg-dark rounded">
        <div class="navbar">
          <ul class="navbar-nav mr-auto  mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="MentionL.html">Mentions légales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Horaires.html">Horaires</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="PlanduSite.html">Plan du site</a>
            </li>
          </ul>
        </div>
      </nav>
      
    </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>