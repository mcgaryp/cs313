<?php

   include "../classes/account.php";
   include "../classes/movie.php";

   session_start();

   if (isset($_SESSION["account"])) {
      $account = $_SESSION["account"];
   } else {
      header("location: ../");
   }

?>