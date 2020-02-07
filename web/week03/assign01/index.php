<?php
   session_start();
   // session_unset();
   // session_destroy();

   $_SESSION["current"] = "assign01";
   
   // Getting my items
   $items = json_decode(file_get_contents("./data/data.json"), true);
   
   // Make the form unique
   foreach ($items as $key => $value) {
      $items[$key]["link"] = "link-" . $key;
   }

   if (!isset($_SESSION["cart"])) {
      $_SESSION["cart"] = json_encode(
         (object) [
            "address" => (object) [
               "street" => "",
               "city" => "",
               "state" => "",
               "zip" => "",
               "country" => ""
            ],
            "items" => [],
            "total" => 0
         ]
      );
   }
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="author" content="Porter McGary">
   <title>Far Far Away Galaxy Store</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="../../../shared/nav.css">
   <link rel="stylesheet" href="../../shared/columns.css">
   <link rel="stylesheet" type="text/css" href="../../shared/base.css">
   <link rel="stylesheet" href="./css/assign.css">
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
   <?php require "header.php" ?>

   <!-- Browse Content 
         Taken from bootstrap as a template and changed to my version-->
   <div class="container">

      <div class="row">

         <div class="col-lg-3">

            <h1 class="my-4">A Galaxy Far Far Away Shop</h1>
            <div class="list-group">
               <!-- TODO Add sections -->
               <a href="#blasters" class="list-group-item black-text">Blasters</a>
               <a href="#clothes" class="list-group-item black-text">Clothing</a>
               <!-- <a href="#lightsabers" class="list-group-item">Lightsaber Parts (Comming Soon)</a>
               <a href="#speeders" class="list-group-item">Speeders (Comming Soon)</a>
               <a href="#ships" class="list-group-item">Ships (Comming Soon)</a> -->
            </div>
         </div>
         <!-- /.col-lg-3 -->

         <div class="col-lg-8">

            <!-- Carousel Comming Soon! I likes this example and if time permits I will have it done
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <div class="carousel-item active">
                  <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
               </div>
               <div class="carousel-item">
                  <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
            </a>
            </div> -->

            <div class="row">

               <!-- PHP generated -->
               <?php
                  foreach ($items as $item) { ?>
                     <div class="col-lg-4 col-md-6 mb-4">
                     <div class="card h-100">
                        <a href="#"><img class="card-img-top item-image" src="<?=$item["url"]?>" alt=""></a>
                        <div class="card-body">
                           <h4 class="card-title">
                              <?= $item["title"] ?>
                           </h4>
                           <h5>$<?= $item["price"] ?></h5>
                           <p class="card-text"></p>
                        </div>
                        <div class="card-footer">
                           <button class="text-muted <?=$item["link"]?> add-to-cart" item-id="<?=$item["id"]?>" id="<?=$item["id"]?>">Add to Cart</button>
                        </div>
                     </div>
                     </div>
            <?php } ?>

            </div>
            <!-- /.row -->

         </div>
         <!-- /.col-lg-9 -->

         <!-- shopping cart icon -->
         <div class="float-right">
            <a href="./pages/viewCart.php">
               <div id="cart" class="flex-container pointer">
                  <img id="shoppingCartIcon" class="icon" src="../../pictures/shoppingCartIcon.jpg" alt="Shopping Cart">
                  <div class="circle"></div>
               </div>
            </a>
         </div>
         <!-- /.col-lg-1 -->

      </div>
      <!-- /.row -->

   </div>
   <!-- /.container -->

   <!-- Footer -->
   <?php require "../../shared/footer.php"?>

   <!-- Scripts -->
   <script src="./script/index.js"></script>
   <script src="./script/base.js"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <script type="text/javascript" src="../../../shared/nav.js"></script>
<body>