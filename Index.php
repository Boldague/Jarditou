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

<div class="row d-flex mx-0">
  <div class="col-12 col-md-8 shadow">
    <p class="h2">L'entreprise</p>
    <p class="lead">Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.</p>
    <p class="lead">Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
    <p class="lead">Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie</p>

    <p class="h2">Qualité</p>
    <p class="lead">Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet. Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>

    <p class="h2">Devis gratuit</p>
    <p class="lead">Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.</p>
  </div>
  <div class="col-12 col-md-4 bg-warning shadow">
    <p class="h2 m-2 text-center">[COLONNE DROITE]</p>
  </div>
</div>

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