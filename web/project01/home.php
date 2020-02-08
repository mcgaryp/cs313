<?php
   session_start();
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

      function Movie($image, $title, $description, $rating, $year) {
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

   print("This is right after db fun call");

   // Just get some of the movies preparation
   $movieDB = $db->prepare("SELECT * FROM movie m INNER JOIN movie_group mg on m.movie_id = mg.movie_id AND mg.account_id = 2");
   $movieDB->execute();

   print("<br>This is right after db prepare and execute call");

   // Create array to hold all the users movies
   $movies = array();

   print("<br> Just before the loop");
   $i = 0;
   // Pass it into the object
   while($row = $movieDB->fetch(PDO::FETCH_ASSOC)) {
      $i++;

      print("<br>Creating movie Object....");

      $movie = new Movie($row["image"], $row["title"], $row["description"], $row["rating"], $row["year"]);
      
      print("<br>Just before the push to array");

      array_push($movies, $movie);

      print("<br> this is in the loop it ran: $i");
   }

   print("<br> this is after the loop");

   print_r($movies);

   ?> 
      <div class="container">
         <div class="row justify-content-center pb-5">
            <div class="col-12">
               <div id="carouselRecent" class="carousel slide" data-ride="carousel">
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
                     <li data-target="#carouselMovie" data-slide-to="0" class="active"></li>
                     <li data-target="#carouselMovie" data-slide-to="1"></li>
                     <li data-target="#carouselMovie" data-slide-to="2"></li>
                  </ol>
                  <!--/.Indicators-->

                  <!--Slides-->
                  <div class="carousel-inner" role="listbox">

                     <!--First slide-->
                     <div class="carousel-item active">

                        <div class="row">
                           <div class="col-md-4">
                           <div class="card mb-2">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                                 alt="Card image cap">
                              <div class="card-body">
                                 <h4 class="card-title">Card title</h4>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                 card's content.</p>
                                 <a class="btn btn-primary">Button</a>
                              </div>
                           </div>
                           </div>

                           <div class="col-md-4 clearfix d-none d-md-block">
                           <div class="card mb-2">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                                 alt="Card image cap">
                              <div class="card-body">
                                 <h4 class="card-title">Card title</h4>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                 card's content.</p>
                                 <a class="btn btn-primary">Button</a>
                              </div>
                           </div>
                           </div>

                           <div class="col-md-4 clearfix d-none d-md-block">
                           <div class="card mb-2">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
                                 alt="Card image cap">
                              <div class="card-body">
                                 <h4 class="card-title">Card title</h4>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                 card's content.</p>
                                 <a class="btn btn-primary">Button</a>
                              </div>
                           </div>
                           </div>
                        </div>

                     </div>
                     <!--/.First slide-->

                     <!--Second slide-->
                     <div class="carousel-item">

                        <div class="row">
                           <div class="col-md-4">
                           <div class="card mb-2">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                                 alt="Card image cap">
                              <div class="card-body">
                                 <h4 class="card-title">Card title</h4>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                 card's content.</p>
                                 <a class="btn btn-primary">Button</a>
                              </div>
                           </div>
                           </div>

                           <div class="col-md-4 clearfix d-none d-md-block">
                           <div class="card mb-2">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg"
                                 alt="Card image cap">
                              <div class="card-body">
                                 <h4 class="card-title">Card title</h4>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                 card's content.</p>
                                 <a class="btn btn-primary">Button</a>
                              </div>
                           </div>
                           </div>

                           <div class="col-md-4 clearfix d-none d-md-block">
                           <div class="card mb-2">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg"
                                 alt="Card image cap">
                              <div class="card-body">
                                 <h4 class="card-title">Card title</h4>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                 card's content.</p>
                                 <a class="btn btn-primary">Button</a>
                              </div>
                           </div>
                           </div>
                        </div>

                     </div>
                     <!--/.Second slide-->

                     <!--Third slide-->
                     <div class="carousel-item">

                        <div class="row">
                           <div class="col-md-4">
                           <div class="card mb-2">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(53).jpg"
                                 alt="Card image cap">
                              <div class="card-body">
                                 <h4 class="card-title">Card title</h4>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                 card's content.</p>
                                 <a class="btn btn-primary">Button</a>
                              </div>
                           </div>
                           </div>

                           <div class="col-md-4 clearfix d-none d-md-block">
                           <div class="card mb-2">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(45).jpg"
                                 alt="Card image cap">
                              <div class="card-body">
                                 <h4 class="card-title">Card title</h4>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                 card's content.</p>
                                 <a class="btn btn-primary">Button</a>
                              </div>
                           </div>
                           </div>

                           <div class="col-md-4 clearfix d-none d-md-block">
                           <div class="card mb-2">
                              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(51).jpg"
                                 alt="Card image cap">
                              <div class="card-body">
                                 <h4 class="card-title">Card title</h4>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                 card's content.</p>
                                 <a class="btn btn-primary">Button</a>
                              </div>
                           </div>
                           </div>
                        </div>

                     </div>
                     <!--/.Third slide-->

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
   </body>
</html>