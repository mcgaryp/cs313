<?php 

session_start();

$_SESSION["current"] = "dir";

?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="shared/base.css">
      <link rel="stylesheet" type="text/css" href="shared/nav.css">
      <link rel="stylesheet" type="text/css" href="shared/columns.css">
      <link rel="stylesheet" type="text/css" href="shared/text.css">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>My Directory</title>
      <meta name="description" content="Intent to easily go through diretories and files.">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="">
   </head>
   <body>
      <?php require "shared/header.php"?> 

      <!-- Notes -->
      <h1>Still a working Progress...</h1>

      <!-- PHP to generate directory -->
      <?php 
         class fileN {
            public $fileName;
            public $fileType;
            public $cwd;
         }

         $cwd = getcwd();
         $folder = ".";

         $files = scandir($folder);
         $directory = Array();

         $size = sizeof($files);
         $i = 0;

         while ($i < $size) {
            $directory[$i] = new fileN();
            $directory[$i]->fileName = $files[$i];
            $directory[$i]->fileType = filetype($files[$i]);
            $directory[$i]->cwd = realpath(getcwd());
            $i++;
         }

         $str = json_encode($directory);
         print "\n $str \n";
      ?>
      
      <!-- Footer -->
      <?php require "shared/footer.php"?>
      
      <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script type="text/javascript" src="shared/nav.js"></script>
   </body>
</html> 

<!-- 
   [{"fileName":".","fileType":"dir","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"..","fileType":"dir","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":".DS_Store","fileType":"file","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"Week01","fileType":"dir","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"Week02","fileType":"dir","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"Week03","fileType":"dir","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"assign01.php","fileType":"file","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"assign02.php","fileType":"file","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"directory.php","fileType":"file","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"index.php","fileType":"file","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"intro.php","fileType":"file","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"pictures","fileType":"dir","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"project.php","fileType":"file","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"},
   {"fileName":"shared","fileType":"dir","cwd":"\/Users\/porter\/BYU-Idaho\/Winter 2020\/Web Engineering II\/cs313-php\/web"}] -->