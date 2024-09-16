<?php
include "inscpt.php";

if(isset($_GET["nom"]) && isset($_GET["mail"]) && 
isset($_GET["comment"]))
   {
      $nom= $_GET["nom"];
      $email= $_GET["mail"];
      $texte= $_GET["comment"];
      
      $contact= mysqli_query($link, "INSERT INTO contact (nom, email, messag) VALUES ('$nom', '$email',
        '$texte')");
     
     if($contact)
     {
    echo "message recu, nous vous reviendrons dans les meilleurs delais";

     }
    else
    {
    echo "erreur";
    }
  }

?>