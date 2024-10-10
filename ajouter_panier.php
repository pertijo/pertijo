<?php
//inclure la page de connexion
include_once "inscpt.php";
//verifier si une session existe
if(!isset($_SESSION)){
    //sinon demarrer la session
    session_start();
}
//creer la session
if(!isset($_SESSION['projet'])){
    //s'il n'existe pas une session on cree une et on mets un tableau a l'interieur
    $_SESSION['projet'] = array();
}
//recuperation de l'id dans le lien
if(isset($_GET['id'])){//si un id a ete envoye alors :
    $id = $_GET['id'];
    //verifier grace a l'id si le produit existe dans la bd
    $product = mysqli_query($link, "SELECT * FROM products WHERE id = $id");
    if(empty(mysqli_fetch_assoc($product))){
        //si ce produit existe
        die("Ce produit n'existe pas");
    }
//ajouter le produit dans le panier (le tableau)
if(isset($_SESSION['projet'][$id])){//si le produit est deja dans le panier
    $_SESSION['projet'][$id]++; // Represente la quantite
}else {
    //sinon on ajoute le produit
    $_SESSION['projet'][$id]=1;   
}
//redirection vers la page index_panier.php
header("Location:index_panier.php");
}
?>