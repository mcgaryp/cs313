<?php
   $name = htmlspecialchars($_POST["name"]);
   $email = htmlspecialchars($_POST["email"]);
   $major = htmlspecialchars($_POST["major"]);
   $comments = htmlspecialchars($_POST["comments"]);
   $continents = $_POST["continent"];
?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Team Activity</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php require "../../shared/css.php" ?>
   </head>
   <body>
      Your name is <?=$name?><br>
      mailto: <?=$email?><br>
      Your Major is <?=$major?><br>
      Your comments <br><?=$comments?><br>
      Your continents 
      <?php 
         foreach($continents as $value) {
            echo "$value <br>";
         }
      ?>
      <script src="" async defer></script>
   </body>
</html>