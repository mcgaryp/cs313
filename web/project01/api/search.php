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
            $titleQ = 'SELECT * FROM movie WHERE title iLIKE :search;';
            $imageQ = 'SELECT * FROM movie WHERE image iLIKE :search;'; 
            $descQ = 'SELECT * FROM movie WHERE description iLIKE :search;'; 
            $ratQ = 'SELECT * FROM movie WHERE rating iLIKE :search;'; 
            $yearQ = 'SELECT * FROM movie WHERE year iLIKE :search;';

            $querys = array();
            array_push($querys, $titleQ);
            array_push($querys, $imageQ);
            array_push($querys, $descQ);
            array_push($querys, $ratQ);
            array_push($querys, $yearQ);

            $movies = array();

            foreach($querys as $query) {
               echo "hello<br>";
               $state = $db->prepare($query);
               $state->bindValue(':search', $searchItem);
               $state->execute();

               while($row = $state->fetch(PDO::FETCH_ASSOC)) {
                  $movie = new Movie($row["movie_id"], $row["image"], $row["title"], $row["description"], $row["rating"], $row["year"]);
                  array_push($movies, $movie);
                  echo $movie;
               }
            }
            
         } catch (Exception $e) {
            echo "Error with DB. Details: $e";
            die;
         }

         $_SESSION["results"] = $movies;
         print_r($_SESSION);
         // header("location: ../searchResults.php");

      } else {
         header("location: ../home.php", true);
         die;
      }

   } else {
      header("location: ../", true);
      die;
   }
