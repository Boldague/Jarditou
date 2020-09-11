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

<nav class="nav navbar mt-2 rounded h4 ">
  <div class="navbar">
    <ul class="navbar-nav mr-auto  mt-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="Index.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Accueil</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="Index.php#entreprise">L'entreprise</a>
          <a class="dropdown-item" href="Index.php#qualite">Qualité</a>
          <a class="dropdown-item" href="Index.php#devis">Devis gratuit</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Produits</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="tableau.php">Catalogue de produits</a>
          <a class="dropdown-item" href="ajout.php">Nouveau produit</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="Contact.php">Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Mentions légales</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="MentionL.php#droit">Droit d'accès</a>
          <a class="dropdown-item" href="MentionL.php#cookies">Utilisation des cookies</a>
          <a class="dropdown-item" href="MentionL.php#droitsauteur">Respect des droits d'auteur</a>
          <a  class="dropdown-item" href="MentionL.php#vente">Vente de produits phytosanitaires</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="Horaires.php">Horaires</a>
      </li>
    </ul>
  </div>
</nav>

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