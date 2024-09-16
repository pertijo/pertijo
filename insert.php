<?php
include "inscpt.php";

if(isset($_GET["nom"]) && isset($_GET["prenom"]) && 
isset($_GET["username"]) && isset($_GET["mail"]) &&
isset($_GET["gender"]) && isset($_GET["ville"]) &&
isset($_GET["phone"]) && isset($_GET["password"]) &&
isset($_GET["confirm_password"]))
   {
      $nom= $_GET["nom"];
      $prenom= $_GET["prenom"];
      $username= $_GET["username"];
      $mail= $_GET["mail"];
      $sexe= $_GET["gender"];
      $ville= $_GET["ville"];
      $phone= $_GET["phone"];
      $password= $_GET["password"];
      $confirm_password= $_GET["confirm_password"];


      $req= mysqli_query($link, "INSERT INTO user (nom, prenom, utilisateur, mail, sexe,
       ville, tel, mdp, confirm_mdp) VALUES ('$nom', '$prenom' ,'$username', '$mail', '$sexe', '$ville',
        '$phone', '$password', '$confirm_password')");
     
     if($req)
     {
    echo "insertion effectuee";

     }
    else
    {
    echo "erreur insertion";
    }
  }

?>