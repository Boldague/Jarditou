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
        <div class="table-responsive shadow">
          <p class="h1 text-center">Horaires</p>
          <table class="table text-center"> 
              <tr class="table-warning">
                <td>Lundi</td>
                <td>7h-12h</td>
                <td>13h-22h</td>
              </tr>
              <tr>
                <td>Mardi</td>
                <td>7h-12h</td>
                <td>13h-22h</td>
              </tr>
              <tr class="table-warning">
                <td>Mercredi</td>
                <td>7h-12h</td>
                <td>13h-19h</td>
              </tr>
              <tr>
                <td>Jeudi</td>
                <td>7h-12h</td>
                <td>13h-22h</td>
              </tr>
              <tr class="table-warning">
                <td>Vendredi</td>
                <td>7h-12h</td>
                <td>13h-22h</td>
              </tr>
              <tr>
                <td>Samedi</td>
                <td>7h-12h</td>
                <td>13h-19h</td>
              </tr>
              <tr class="table-warning">
                <td>Dimanche</td>
                <td>7h-12h</td>
                <td>Fermé</td>
              </tr>
          </table>
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