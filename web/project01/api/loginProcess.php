<?php

   include "../classes/account.php";

   session_start();

   require "dbConnect.php";

   if (isset($_POST['login'])) {
      if (isset($_POST["username"]) && isset($_POST["password"])) {
         $user = $_POST["username"];
         $pass = $_POST["password"];
      }

      $user = 'porter';
      $password = 'password';

      echo $user."<br>";
      echo $pass."<br>";

      // Get database
      $db = getBD();
      try {
         $query = "SELECT * FROM account a WHERE a.username = :user AND a.password = :pass;";
         $accountTable = $db->prepare($query);
         $accountTable->bindValue(':user', $user);
         $accountTable->bindValue(':pass', $pass);
         $accountTable->execute();

         echo $query."<br>";
         
         // Check to see if we have the right account
         if ($row = $accountTable->fetch(PDO::FETCH_ASSOC)) {
            echo "Made it to this<br>";
            $account = new Account($row['account_id'], $row['username'], $row['password'], $row['email']);
         } else {
            header("../index.php", true);
         } 

         echo " Setting up Querey<br>";
         echo gettype($account->id)."<br>";

         // Get the account set up
         $query = "SELECT nick_name FROM account a INNER JOIN user_profile up ON up.account_id = a.account_id AND a.account_id = $account->id;";
         $profileTable = $db->prepare($query);
         $profileTable->execute();

         echo $query;

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
      
      // direct to the next page
      // header("location: ../home.php", true);

   } else {
      // Failed to login with stuff on button click
      header("../index.php", true);
      exit;
   }

?>