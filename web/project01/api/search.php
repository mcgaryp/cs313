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
            $searchItem = '%'.$searchItem.'%';
            $query = 'SELECT * FROM movie WHERE title iLIKE :search OR image iLIKE :search OR description iLIKE :search OR rating iLIKE :search OR year iLIKE :search;';

            $state = $db->prepare($query);
            $state->bindValue(':search',  $searchItem);
            $state->execute();

            $movies = array();

            while($row = $state->fetch(PDO::FETCH_ASSOC)) {
               $movie = new Movie($row["movie_id"], $row["image"], $row["title"], $row["description"], $row["rating"], $row["year"]);
               array_push($movies, $movie);
            }
         } catch (Exception $e) {
            echo "Error with DB. Details: $e";
         }

         $_SESSION["results"] = $movies;
         print_r($_SESSION);
         // header("location: ../searchResults.php");

      } else {
         header("location: home.php", true);
      }

   } else {
      header("location: ../", true);
   }

?>