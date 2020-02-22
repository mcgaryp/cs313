<?php

include "../classes/account.php";

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
      $query = "DELETE FROM movie WHERE movie_id = $movieId AND account_id = $account->id;";
      $state = $db->prepare($query);
      $state->execute();
      header("location: ../");
   } catch (Exception $e) {
      echo "Database trouble. Details: $e";
   }
      
   // check to see if the movie group has that movie id in it if it doesnt then delete the movie
   // echo true;
} else {
   echo "Movieid not set";
}
