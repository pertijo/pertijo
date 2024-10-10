<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="styles_panier.css?version=2" rel="stylesheet">
     <title>Boutique</title>
</head>

  <body>
    <!-- afficher le nombre de produit dans le panier-->
    <a href="panier.php" class="link">Panier<span><?= array_sum($_SESSION['projet'])?></span></a>
    <section class="products_list">
        <?php
        //inclure la page de connexion
         include_once "inscpt.php";
        //afficher la liste des produits
        $req = mysqli_query($link, "SELECT * FROM products");
        while($row = mysqli_fetch_assoc($req)){
        ?>
        <form action="" class="product">
            <div class="image_product">
                <img src="gateaux/<?=$row['img']?>" width="270" height="346">
            </div>
            <div class="content">
               <h2 class="price"><?=$row['price']?>fcfa</h2> 
               <a href="ajouter_panier.php?id=<?=$row['id']?>" class="id_product">Ajouter au panier</a>  
            </div>
        </form>
        <?php } ?>
        
    </section>
  </body>

</html>