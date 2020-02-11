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
      $db = getBD();

      $query = "SELECT * FROM account a WHERE a.username = 'porter' AND a.password = 'password';";
      $accountTable = $db->prepare($query);
      $accountTable->execute();
      
      // Check to see if we have the right account
      if ($row = $accountTable->fetch(PDO::FETCH_ASSOC)) {
         $account = new Account($row["account_id"], $row["username"], $row["password"], $row["email"]);
      } else {
         header("../index.php", true);
      }

      // Get the account set up
      $query = 'SELECT nick_name FROM account a INNER JOIN user_profile up ON up.account_id = a.account_id AND a.account_id = 2;';
      $profileTable = $db->prepare($query);
      $profileTable->execute();

      $profiles = [];

      // pull data from database
      while($row = $profileTable->fetch(PDO::FETCH_ASSOC)) {
         $profile = $row["nick_name"];
         array_push($profiles, $profile);
      }

      // set the session variables
      $_SESSION["account"] = $account;
      $_SESSION["profiles"] = $profiles;
      
      // direct to the next page
      header("location: ../home.php", true);

   } else {
      // Failed to login with stuff on button click
      header("../index.php", true);
      exit;
   }

?>