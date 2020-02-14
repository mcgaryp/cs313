<?php

   include "../classes/account.php";
   include "../classes/movie.php";

   session_start();

   if (isset($_SESSION["account"])) {

      if (isset($_POST["search"])) {

         $account = $_SESSION["account"];
         $searchItem = $_POST["search"];

         // get database
         require "dbConnect.php";
         $db = getBD();

         // search for key words
         try {
            $searchItem = $searchItem.'%';
            $titleQ = 'SELECT * FROM movie WHERE title iLIKE :search;';

            $movies = array();
            $state = $db->prepare($query);
            $state->bindValue(':search', $searchItem);
            $state->execute();

            while($row = $state->fetch(PDO::FETCH_ASSOC)) {
               $movie = new Movie($row["movie_id"], $row["image"], $row["title"], $row["description"], $row["rating"], $row["year"]);
               array_push($movies, $movie);
            }
            
         } catch (Exception $e) {
            echo "Error with DB. Details: $e";
            die;
         }

         $_SESSION["results"] = $movies;
         header("location: ../searchResults.php", true);

      } else {
         header("location: ../home.php", true);
         die;
      }

   } else {
      header("location: ../", true);
      die;
   }
