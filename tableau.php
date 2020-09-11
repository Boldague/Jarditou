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

<?php
    
    $requete = "SELECT * FROM produits ORDER BY pro_id ASC";
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
?>

<div class="row d-flex text-center bg-dark mx-0 p-auto ">
    <div class="col-3 d-flex justify-content-start">
      <a href="ajout.php" role="button" class="btn btn-white mx-1">
      <img class="img-fluid d-block m-auto w-50" src="public/images/icons/plus_white_64px.png " alt="add produit" title="add produit">
      </a>
    </div>
    <div class=" col-6 h2 text-light text-center align-self-center">
      Les produits
    </div>
    <div class="col-3 ">
    </div>
</div>

  <?php
  $tab = array("bmp","jpg","jpeg","png","x-png","tiff");
  $dossierImage = "png";
  $dossierImage = "jpg";

  while ($row = $result->fetch(PDO::FETCH_OBJ))
  {
    echo '<div class="row m-0 w-100">';
    
          for($i = 0; $i < count($tab);$i++)
          {
            if(!file_exists('public/images/produits/'.$dossierImage.'/'.$row->pro_id.'.'.$tab[$i]))
            {
              $pathImg = 'public/images/produits/'.$dossierImage.'/erreurImage.'.$dossierImage;
            }
            else
            {
              $pathImg = 'public/images/produits/'.$dossierImage.'/'.$row->pro_id.'.'.$tab[$i];
              break;
            }
          }
  
          echo '<div class="col-12  bg-dark p-1 my-2 align-items-stretch ">
                <div class=" bg-white ">
                <div class="mx-auto d-flex justify-content-between text-dark h2 bg-light ">
                <div class="ml-2 text-uppercase">';
          echo $row->pro_libelle;
          echo '</div>
                <div class=" align-items-center">
                <a class="text-danger bg-danger"href="Detail.php?id='.$row->pro_id.'" title='.$row->pro_libelle.'>
                <img class=" img-fluid d-block mx-auto my-1 w-50" src="public/images/icons/info_back_64px.png " alt="info"" title="info">
                </a>
                </div>
                </div>
                <div class="row flex-row align-items-center ">
                <div class="col-6 ">
                <img class=" img-fluid d-block m-auto w-md-75" src='.$pathImg.' alt='.$row->pro_libelle.' title='.$row->pro_libelle.'>
                </div>
                <div class="col-6 h6">';
                $style1 = 'class="flex-row flex-fill text-primary bg-light font-weight-bold pl-2 pl-md-1"';
                $style2 = 'class="flex-row flex-fill text-right text-secondary px-2 pl-md-1 "';
          echo '<div '.$style1.'>ID</div>
                <div '.$style2.'>'.$row->pro_id.'</div>
                <div '.$style1.'>Réference</div>
                <div '.$style2.'>'.$row->pro_ref.'</div>
                <div '.$style1.'>Prix</div>
                <div '.$style2.'>'.$row->pro_prix.'</div>
                <div '.$style1.'>Stock</div>
                <div '.$style2.'>'.$row->pro_stock.'</div>
                <div '.$style1.'>Couleur</div>
                <div '.$style2.'>'.$row->pro_couleur.'</div>
                <div '.$style1.'>Date d\'Ajout</div>';
                $dateAjout = date_create($row->pro_d_ajout);
          echo '<div '.$style2.'>'.date_format($dateAjout,'d/m/Y').'</div>';
                $dateModif = "";
                if($row->pro_d_modif != null)
                {
                  echo '<div '.$style1.'>Date de Modif</div>';
                  $dateModif = date_create($row->pro_d_modif);
                  $dateModif = date_format($dateModif,'d/m/Y');
                  echo '<div '.$style2.'>'.$dateModif.'</div>';
                }
                else
                {
                  echo '<div '.$style1.'>Date de Modif</div>
                        <div '.$style2.'>aucune</div>';
                }
                if(($row->pro_bloque) == 1)
                {
                  echo '<div '.$style1.'>Bloqué</div>
                        <div '.$style2.'>Oui</div>';
                }
                else
                {
                  echo '<div '.$style1.'>Bloqué</div>
                        <div '.$style2.'>Non</div>';
                }
          echo '</div></div></div>';
      echo '</div>';
    echo '</div>';
  }

    
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