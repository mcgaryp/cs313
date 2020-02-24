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
         header("location: ../createAccount.php?error=Passwords do not match", true);
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
   header("location: ../profiles.php", true);
}

// Are we adding movies?
if (isset($_POST["add"])) {

   // Set variables
   $title = $_POST["title"];
   $rating = $_POST["rating"];
   $year = $_POST["year"];
   $desc = $_POST["desc"];
   $image = $_POST["image"];
   $account = $_SESSION["account"];

   // create movie in database
   require "dbConnect.php";
   $db = getBD();

   // Try to add to DB
   try {

      // search movies to see if we already have this content
      // if we have it just ask for the personalized mp4
      $query = 'SELECT * FROM movie WHERE title = :title';
      $movieTable = $db->prepare($query);
      // bind values
      $movieTable->bindValue(':title', $title);
      $movieTable->execute();

      if ($row = $movieTable->fetch(PDO::FETCH_ASSOC)) {
         header("location: ../addContent.php?success=0&error=This movie title has been taken&title=$title", true);
         die;
      }

      // else continue to add to the other stuff

      // query
      $query = 'INSERT INTO movie (account_id,image,title,description,rating,year) VALUES (:account, :img, :title, :desc, :rat, :year);';
      $movieTable = $db->prepare($query);
      // bind values
      $movieTable->bindValue(':account', $account->id);
      $movieTable->bindValue(':img', $image);
      $movieTable->bindValue(':title', $title);
      $movieTable->bindValue(':desc', $desc);
      $movieTable->bindValue(':rat', $rating);
      $movieTable->bindValue(':year', $year);
      $movieTable->execute();

      // Send back to add content
      header("location: ../addContent.php?success=1&title=$title added to your collection", true);
      die;

      // Catch erros
   } catch (Exception $e) {
      header("location: ../addContent.php?success=0&error=$e&title=$title", true);
      die;
   }

   // are we adding a profile?
   if (isset($_POST["addProfile"])) {

      // set variables
      $account = $_SESSION["account"];
      $nickname = $_POST["nickname"];
      $icon = $_POST["icon"];

      // get db
      require "dbConnect.php";
      $db = getBD();

      // check to see if we have that profile nick name already
      $query = 'SELECT nick_name FROM user_profile WHERE nick_name = :n AND account_id = :id;';
      $state = $db->prepare($query);
      $state->bindValue(':n', $nickname);
      $state->bindValue(':id', $account->id);

      // execute
      $state->execute();

      // if we find a match tell everyone that we found one!
      if ($row = $state->fetch(PDO::FETCH_ASSOC)) {
         header("location: ../createProfile.php?success=0&nicknam=$nickname&error=This nickname has already been taken");
         die;
      }

      // else continue to add profile
      $query = 'INSERT INTO user_profile (account_id, icon, nickname) VALUES (:id,:icon,:nick;';
      $state = $db->prepare($query);
      $state->bindValue(':id', $account->id);
      $state->bindValue(':icon', $icon);
      $state->bindValue(':nick',$nickname);

      // execute
      $state->execute();

      // send back to profiles to choose your new profile
      header("location: ../profiles.php");
   }
}
