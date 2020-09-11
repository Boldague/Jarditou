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
<div class="row d-flex text-center bg-dark mx-0 pt-2 pb-2">
      <div class=" col-12 h2 text-light text-center">
        Les mentions légales
      </div>
</div>

<div class="row d-flex mx-0">
  <div class="col-12 shadow">
    <p class="h2"id="droit">Respect de la vie privée et des données personnelles</p>
    <p class="lead">Conformément à la réglementation en vigueur relative à la protection des personnes physiques à l'égard des traitements de données à caractère personnel, ce site a été déclaré auprès de la Commission Nationale Informatique et Libertés et enregistré sous le numéro 789168. Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent (art. 26, 34 a` 38 de la loi "Informatique et Libertés" n°78-17 du 6 janvier 1978, modifiée en août 2004). Pour exercer ce droit, adressez-vous à :  Jarditou - 2 Avenue des Parcs - 91090 Lisses.</p>

    <p class="h2" id="droitsauteur">Utilisation des cookies</p>
    <p class="lead">Jarditou fait usage de cookies dans l'exploitation de son site internet. Ils ont pour but de signaler votre passage sur notre site. Les informations relatives à votre visite ne sont stockées que pour permettre les traitements statistiques. Ils nous permettent d'améliorer les fonctionnalités et les informations fournies par notre site pour mieux répondre à vos besoins. Ils ne sont en aucun cas cédés à des tiers. Nous vous rappelons que votre navigateur possède des fonctionnalités qui vous permettent de vous opposer à l'enregistrement de cookies, d'être prévenu avant d'accepter les cookies, ou de les effacer.</p>

    <p class="h2" id="droit">Respect des droits d'auteur</p>
    <p class="lead">©copyright 2020 Jarditou. Tous droits réservés. L'usage ou la reproduction partielle même des textes, photos ou graphismes publiés sur ce site sont interdits sans l'accord de  Jarditou. Toute tentative donnera lieu à des poursuites.</p>

    <p class="h2" id="vente">Vente de produits phytosanitaires</p>
    <p class="lead">Les jardineries Jarditou et le site de vente en ligne  Jarditou.com sont agréés par l'administration. Celle-ci nous a remis un numéro d'agrément pour la vente des produits phytos à des utilisateurs non professionnels. Cet agrément a été délivré après la fourniture d’éléments permettant d’attester de la conformité de nos jardineries à la réglementation concernant la distribution des produits phytos.</p>
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