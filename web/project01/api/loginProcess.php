<?php

use function PHPSTORM_META\type;

include "../classes/account.php";

   session_start();

   require "dbConnect.php";

   if (isset($_POST['login'])) {
      if (isset($_POST["username"]) && isset($_POST["password"])) {
         $user = $_POST["username"];
         $pass = $_POST["password"];
      }

      // Get database
      $db = getBD();
      try {
         $query = "SELECT * FROM account a WHERE a.username = :user AND a.password = :pass;";
         $accountTable = $db->prepare($query);
         $accountTable->bindValue(':user', $user);
         $accountTable->bindValue(':pass', $pass);
         $accountTable->execute();
         
         // Check to see if we have the right account
         if ($row = $accountTable->fetch(PDO::FETCH_ASSOC)) {
            $account = new Account($row['account_id'], $row['username'], $row['password'], $row['email']);
         } else {
            // if failed to find account
            header("location: ../index.php?error=Incorrect Username or Password", true);
         }

         // Get the account set up
         $query = "SELECT nick_name FROM account a INNER JOIN user_profile up ON up.account_id = a.account_id AND a.account_id = $account->id;";
         $profileTable = $db->prepare($query);
         $profileTable->execute();

         $profiles = [];

         // pull data from database
         while($row = $profileTable->fetch(PDO::FETCH_ASSOC)) {
            $profile = $row["nick_name"];
            array_push($profiles, $profile);
         }

      } catch (Exception $e) {
         echo "Error with DB. Details: $e";
         die();
      }

      // set the session variables
      $_SESSION["account"] = $account;
      $_SESSION["profiles"] = $profiles;

      print_r($_SESSION);
      
      // direct to the next page
      header("location: ../home.php", true);

   } else {
      // Failed to login with stuff on button click
      header("../index.php", true);
      exit;
   }

?>