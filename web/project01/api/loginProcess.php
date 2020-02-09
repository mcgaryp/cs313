<?php

   session_start();

   require "dbConnect.php";

   // Account class object
   class Account {
      public $account_id;
      public $username;
      public $password;
      public $email;

      function Account($id, $user, $pass, $email) {
         $this->account_id = $id;
         $this->username = $user;
         $this->password = $pass;
         $this->email = $email;
      }
   }

   if (isset($_POST['login'])) {
      // Get database
      $db = getDB();

      $query = "SELECT * FROM account WHERE username = 'porter' AND password = 'password'";
      $accountTable = $db->prepare($query);
      $accountTable->execute();

      // Check to see if we have the right account
      if (mysqli_fetch_assoc($accountTable)) {
         while($row = $accountTable->fetch(PDO::FETCH_ASSOC)) {
            $account = new Account($row["account_id"], $row["username"], $row["password"], $row["email"]);
         }
      } else {
         echo "Please input correct username and password";
         exit;
      }

      $query = 'SELECT nick_name FROM account a INNER JOIN user_profile up ON up.account_id = a.account_id AND a.account_id = 2;';
      $profileTable = $db->prepare($query);
      $profileTable->execute();

      // pull data from database
      if (mysqli_fetch_assoc($profileTable)) {
         // Logged in successful
         while($row = $profileTable->fetch(PDO::FETCH_ASSOC)) {
            echo "Did enter loop";
            $profile = $row["nick_name"];
            array_push($profiles, $profile);
         }
      } else {
         // failed to find any profiles to the account!
         echo "Failed to do that thing";
      }
   } else {
      echo "could not find login";
   }

   // set the session variables
   $_SESSION["account"] = $account;
   $_SESSION["profiles"] = $profiles;

   echo "trying print out some things <br>";
   echo $account;
   print_r($profiles);
   
   // header("location: ../home.php", true);

   // Used as a reference
   // https://www.youtube.com/watch?v=PXugYdXCBck

   ?>