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
      echo "entered first if<br>";
      // Get database
      
      $db = getBD();

      // $account = new Account();

      $query = "SELECT * FROM account a WHERE a.username = 'porter' AND a.password = 'password';";
      echo "query: $query<br>";
      $accountTable = $db->prepare($query);
      $accountTable->execute();
      echo "executed query<br>";
      // Check to see if we have the right account
      while ($row = $accountTable->fetch(PDO::FETCH_ASSOC)) {
         echo "entered account table if<br>";
         $account = new Account($row["account_id"], $row["username"], $row["password"], $row["email"]);
         if (isset($account)) {
            echo "Account: $account->id<br>";
         } else {
            echo "Failer to set account";
         }
      }
      // } else {
      //    echo "Please input correct username and password<br>";
      //    header("../index.php", true);
      //    exit;
      // }

      $query = 'SELECT nick_name FROM account a INNER JOIN user_profile up ON up.account_id = a.account_id AND a.account_id = 2;';
      echo "query: $query<br>";
      $profileTable = $db->prepare($query);
      $profileTable->execute();
      echo "query executed<br>";

      $profiles = [];

      // pull data from database
      while($row = $profileTable->fetch(PDO::FETCH_ASSOC)) {
         echo "Did enter profile loop<br>";
         $profile = $row["nick_name"];
         array_push($profiles, $profile);
         echo "profile: $profile<br>";
      }

      // set the session variables
      $_SESSION["account"] = $account;
      $_SESSION["profiles"] = $profiles;

      echo "trying print out some things <br>";
      echo $account;
      print_r($profiles);
      
      // header("location: ../home.php", true);

   } else {
      echo "could not find login<br>";
      header("../index.php", true);
      exit;
   }

   // Used as a reference
   // https://www.youtube.com/watch?v=PXugYdXCBck

   ?>