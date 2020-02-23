<?php

include "../classes/account.php";
include "../classes/movie.php";

session_start();

if (isset($_SESSION["account"])) {
   $account = $_SESSION["account"];
} else {
   echo "account not set";
   header("location: ../");
}

if (isset($_POST["movieId"])) {
   $movieId = $_POST["movieId"];

   // get database
   require "dbConnect.php";
   $db = getBD();

   // delete from movie group relation first
   try {
      $query = "SELECT * FROM movie WHERE movie_id = $movieId";
      $state = $db->prepare($query);
      $state->execute();

      if($row = $state->fetch(PDO::FETCH_ASSOC)) {
         $movie = new Movie($row["movie_id"], $row["image"], $row["title"], $row["description"], $row["rating"], $row["year"]);
      }

      $query = "DELETE FROM movie WHERE movie_id = $movieId AND account_id = $account->id;";
      $state = $db->prepare($query);
      $state->execute();
      
      header("location: ../removeContent.php?success=1&title=$movie->title");

   } catch (Exception $e) {
      echo "Database trouble. Details: $e";
      header("location: ../removeContent.php?sucess=0&error=$e");
   }
      
} else {
   header("location: ../removeContent.php?success=0&title=$movie->title");
}
