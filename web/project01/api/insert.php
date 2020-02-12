<?php

   include "../classes/account.php";

   session_start();

   // Are we creating an account?
   if (isset($_POST["create"])) {

      // Did we fill the form out right?
      if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["pass"]) && isset($_POST["confirmPass"])) {

         $email = $_POST["email"];
         $user = $_POST["username"];
         
         // Do the passwords match
         if ($_POST["pass"] != $_POST["confirmPass"]) {
            header("location: ../createAccount.php?error=Passwords do not match",true);
            die;
         }

         $pass = $_POST["pass"];
         $confirmPass = $_POST["confirmPass"];

      } else {
         header("location: ../createAccount.php?error=Enter all fields");
      }

      // Create account in the Data base
      require "dbConnect.php";
      $db = getBD();

      // try to add to the DB
      try {
         // Query
         $query = 'INSERT INTO account (username, password,email) VALUES (:user, :pass, :email);';
         $state = $db->prepare($query);
         // bind values
         $state->bindValue(':user', $user);
         $state->bindValue(':pass', $pass);
         $state->bindValue(':email', $email);
         $state->execute();
         // Catch errors
      } catch (Exception $e) {
         echo "Error with DB. Details: $e";
         die;
      }

      // get last creation and its details
      $accountId = $db->lastInsertId("account_account_id_seq");

      try {
         $query = "SELECT * FROM account WHERE account_id = $accountId";
         $state = $db->prepare($query);
         $state->execute();
         
         // get the data
         if ($row = $state->fetch(PDO::FETCH_ASSOC)) {
            $account = new Account($row['account_id'], $row['username'], $row['password'], $row['email']);
         } else {
            // if failed to find account
            header("location: ../index.php?error=Incorrect Username or Password", true);
         }
      } catch (Exception $e) {
         echo "Error with DB. Details: $e";
         die;
      }

      // Create account and add to session
      $_SESSION["account"] = $account;

      // TODO Send to profile pagez
      header("location: ../home.php", true);
   }

   // Are we adding movies?
   if (isset($_POST["add"])) {
      echo "Made it!";
   }

?>