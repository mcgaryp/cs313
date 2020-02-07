<?php

session_start();

// $_SESSION["movieURL"] = "https://www.youtube.com/watch?v=MB80ZuIJATI?autoplay=1";
// $_SESSION["isYouTube"] = true;

$_SESSION["movieURL"] = "../movies/StarDust.m4v";
$_SESSION["isYouTube"] = false;

$movieURL = $_SESSION["movieURL"];
$isYouTube = $_SESSION["isYouTube"];

?>

<!DOCTYPE html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?=$movie?></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="">
   </head>
   <body>
      <?php
         if ($isYouTube) {?>
      <iframe width="420" height="315"
         src="<?=$movieURL?>">
      </iframe>
   <?php } else {?>
      <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
         <source src="<?=$movieURL?>" type="video/m4v">
      </video>
    <?php } ?>
      
      <script src="" async defer></script>
   </body>
</html>