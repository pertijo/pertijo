<?php
  session_start();
  include_once "inscpt.php";

  //supprimer les produits
  // si la variable del existe
  if(isset($_GET['del'])){
    $id_del = $_GET['del'];
    //suppression
    unset($_SESSION['projet'][$id_del]);
  }
?>
<!DOCTYPE html>
<html>
   <head>
     <link href="styles_panier.css?version=2" rel="stylesheet">
     <title>Panier</title>
    </head>

  <body class="panier">
    <a href="index_panier.php" class="link">Boutique</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Prix</th>
                <th>Quantite</th>
                <th>Action</th>

            </tr>
            <?php 
              $total = 0;
              //liste des produits
              //recuperer les cles du tableau session
              $ids = array_keys($_SESSION['projet']);
              //s'il n'y a aucune cle dans le tableau
              if(empty($ids)){
                echo "votre panier est vide";
              }else {
                //si oui
                $products = mysqli_query($link, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");

                //liste des produits avec une boucle foreach
                foreach($products as $product):
                  //calculer le total (prix unitaire * quantite)
                  //et additionner chaque resultats a chaque tour de boucle
                  $total = $total + $product['price'] * $_SESSION['projet'][$product['id']];
                ?>
               <tr>
                  <td><img src="gateaux/<?=$product['img']?>"></td>
                  <td><?=$product['price']?></td>
                  <td><?=$_SESSION['projet'][$product['id']]// Quantite?></td>
                  <td><a href="panier.php?del=<?=$product['id']?>"><img src="gateaux/delete.png"></a></td>
               </tr>
            <?php endforeach ;} ?>

            <tr class="total">
               <th>Total: <?=$total?>fcfa</th>
            </tr>
              
        </table>
    </section>

  </body>
</html>