<?php

   session_start();

   $_SESSION["current"] = "home.php";

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
   // Build some kind of object to pass back to the javascript

   class Movie {
      public $image;
      public $title;
      public $description;
      public $rating;
      public $year;

      function Movie($id, $image, $title, $description, $rating, $year) {
         $this->id = $id;
         $this->image = $image;
         $this->title = $title;
         $this->description = $description;
         $this->rating = $rating;
         $this->year = $year;
      }
   }

   // Get data from db
   require_once "api/dbConnect.php";
   
   // necessary to catch errors thrown from other files
   function exception_error_handler($errno, $errstr, $errfile, $errline ) {
      throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
   }

   set_error_handler("exception_error_handler");

   $db = getBD();

   // Just get some of the movies preparation
   $movieDB = $db->prepare("SELECT * FROM movie m INNER JOIN movie_group mg on m.movie_id = mg.movie_id AND mg.account_id = 2");
   $movieDB->execute();

   // Create array to hold all the users movies
   $movies = array();

   // Pass it into the object
   while($row = $movieDB->fetch(PDO::FETCH_ASSOC)) {
      $movie = new Movie($row["movie_id"], $row["image"], $row["title"], $row["description"], $row["rating"], $row["year"]);
      array_push($movies, $movie);
   }

   // Get recently added top 10

   print_r($_SESSION);

   ?> 
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4">

         <!-- Navbar brand -->
         <a class="navbar-brand" href="#">McMovies</a>

         <!-- Collapse button -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"></span></button>

         <!-- Collapsible content -->
         <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Features</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Pricing</a>
               </li>

               <!-- Dropdown -->
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Dropdown</a>
                  <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  </div>
               </li>

            </ul>
            <!-- Links -->

            <!-- Search form -->
            <form class="form-inline">
               <div class="md-form my-0">
                  <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                  <i class="fas fa-search text-black ml-3" aria-hidden="true"></i>
               </div>
            </form>
         </div>
         <!-- Collapsible content -->

      </nav>
      <!--/.Navbar-->

      <div class="container">
         <div class="row justify-content-center pb-5">
            <div class="col-12">
               <div id="carouselRecent" class="carousel carousel-recent slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#carouselRecent" data-slide-to="0" class="active"></li>
                     <li data-target="#carouselRecent" data-slide-to="1"></li>
                     <li data-target="#carouselRecent" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner h-400">

                     <div class="carousel-item active">
                        <img src="https://via.placeholder.com/300.png/01c/fff" class="d-block w-100" alt="...">
                     </div>
                     <div class="carousel-item">
                        <img src="https://via.placeholder.com/300.png/09a/fff" class="d-block w-100" alt="...">
                     </div>
                     <div class="carousel-item">
                        <img src="https://via.placeholder.com/300.png/34b/fff" class="d-block w-100" alt="...">
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselRecent" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselRecent" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                  </a>
               </div>
               <!-- carousel -->
            </div>
            <!-- col -->
         </div>
         <!-- row -->

         <div class="row justify-content-center pb-5">
            <div class="col-12">
               <!--Carousel Wrapper-->
               <div id="carouselMovie" class="carousel slide carousel-multi-item" data-ride="carousel">

                  <!--Controls-->
                  <a class="carousel-control-prev" href="#carouselMovie" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselMovie" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                  </a>
                  <!--/.Controls-->

                  <!--Indicators-->
                  <ol class="carousel-indicators">
                  <?php 
                     for ($index = 0; $index < count($movies); $index++) { 
                        if ($index % 3 == 0) { ?>
                     <li data-target="#carouselMovie" data-slide-to="<?=$index?>" <?php if ($index == 0) echo "class='active'"; ?>></li>
                  <?php }
                     } ?>
                  </ol>
                  <!--/.Indicators-->

                  <!--Slides-->
                  <div class="carousel-inner" role="listbox">
                     <!--First slide-->
                        <?php 
                           for ($index = 0; $index < count($movies); $index++) { 
                              if ($index % 3 == 0) { ?>
                                 <div class="carousel-item <?php if ($index == 0) { echo "active"; } ?>">
                                 <div class="row justify-content-center">
                        <?php } ?>
                           <div class="col-md-auto">
                              <!-- button -->
                              <button type="button" data-toggle="modal" data-target="<?=$movies[$index]->id?>Modal" class="card modal-button">
                                 <img class="card-img-top movie-image" src="<?=$movies[$index]->image?>"
                                    alt="<?=$movies[$index]->title?> Movie Cover">
                                 <div class="card-body">
                                    <h4 class="card-title text-center"><?=$movies[$index]->title?></h4>
                                 </div>
                              </button>
                              <!-- .button -->

                              <!-- Modal -->
                              <div class="modal fade" id="<?=$movies[$index]->id?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?=$movies[$index]->id?>ModalCenterTitle" aria-hidden="false">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="<?=$movies[$index]->id?>ModalLongTitle"><?=$movies[$index]->title?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="false">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          <div class="row mb-2">
                                             <div class="col">Rating: <?=$movies[$index]->rating?></div>
                                             <div class="col">Year: <?=$movies[$index]->year?></div>
                                          </div>
                                          <h5>Description</h5>
                                          <p><?=$movies[$index]->description?></p>
                                       </div>
                                       <!-- <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
                                       </div> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php 
                              if ($index % 3 == 2) { ?>
                                 </div>
                                 </div>
                        <?php }
                           } ?> 
                  </div>
                  <!--/.Slides-->

               </div>
               <!--/.Carousel Wrapper-->

            </div>
            <!-- .col -->
         </div>
         <!-- .row -->
      </div>
      <!-- .container -->

      <!-- scripts -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="js/carousel.js" async defer></script>
      <script src="js/modal.js" async defer></script>
   </body>
</html>