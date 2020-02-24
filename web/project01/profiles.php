<?php

include "classes/account.php";
include "classes/profile.php";

session_start();

$_SESSION["current"] = "profile";

if (isset($_SESSION["account"])) {
   $account = $_SESSION["account"];
   $profiles = $_SESSION["profiles"];
} else {
   header("location: index.php", true);
}

?>

<!DOCTYPE html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Home</title>
   <meta name="description" content="McMovies home page. Access all you home movie files from here">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/home.css">
   <script src="https://kit.fontawesome.com/79ad9f74b9.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php

   // <!-- Create profiles -->
   if (isset($profiles)) {

      foreach ($profiles as $profile) { ?>
         <div class="bg-dark">
            <div class="container">
               <div class="row text-center">
                  <div class="col-md-6 mb-4">
                     <img class="rounded-circle z-depth-2" alt="100x100" src="<?= $profile->icon ?>">
                     <h2 class="my-5 h2"><?= $profile->nickname ?></h2>
                  </div>
               </div>
            </div>
         </div>

   <?php }
   } else {
      header("location: index.php");
   } ?>

   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>