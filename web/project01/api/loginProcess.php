<?php

   print("hello from process movies");
   session_start();

   $_SESSION["Account"];
   // https://www.youtube.com/watch?v=PXugYdXCBck

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
   print("\nThis si at the top before the connect to DB");   
   require_once "dbConnect.php";
   

   // necessary to catch errors thrown from other files
   // function exception_error_handler($errno, $errstr, $errfile, $errline ) {
   //    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
   // }

   // set_error_handler("exception_error_handler");

   $db = getBD();
   print("\nThis is right after db fun call");
   // Just get some of the movies preparation
   $movieDB = $db->prepare("SELECT * FROM movie m INNER JOIN movie_group mg on m.movie_id = mg.movie_id AND mg.account_id = 2");
   $movieDB->execute();

   // Create array to hold all the users movies
   $movies = array();

   // Pass it into the object
   while($row = $moviesDB->fetch(PDO::FETCH_ASSOC)) {
      $movie = new Movie($row["image"], $row["title"], $row["description"], $roe["rating"], $row["year"]);
      array_push($movies, $movie);
   }

   // Set object in session
   $_SESSION["Movies"] = $movies;

   print_r($_SESSION);

   print("hello from before");
   // Redirect to home.php
   header("Location: ../home.php");
   print("hello");
   exit();


?>
