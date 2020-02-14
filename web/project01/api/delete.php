<?php

include "../classes/account.php";

session_start();

if (isset($_SESSION["account"])) {
   $account = $_SESSION["account"];
} else {
   echo false;
}

if (isset($_POST["movieId"])) {
   $movieId = $_POST["movieId"];

   // get database
   require "api/dbConnect.php";
   $db = getBD();

   // delete from movie group relation first
   try {
      $query = "DELETE FROM movie_group WHERE movie_id = $movieId AND account_id = $account->id;";
      $state = $db->prepare($query);
      $state->execute();
   } catch (Exception $e) {
      echo false;
   }
      
   // check to see if the movie group has that movie id in it if it doesnt then delete the movie

   echo true;
} else {
   echo false;
}

?>