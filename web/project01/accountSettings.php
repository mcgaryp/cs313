<?php

include "classes/account.php";

session_start();

$_SESSION["current"] = "account";
$_SESSION["extension"] = "settings";

if (isset($_SESSION["account"])) {
   $account = $_SESSION["account"];
} else {
   header("location: index.php", true);
}

?>

<!DOCTYPE html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= $account->username ?> Account</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/home.css">
   <script src="https://kit.fontawesome.com/79ad9f74b9.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php include "nav.php"; ?>

   <!-- My settings -->
   <div class="container">
      <h1>Account</h1>
      <hr>
      <div class="row ">
         <div class="col text-black-50">
            <h2>Membership & Billing</h2>
         </div>
         <div class="col">
            <div class="row">
               <div class="col text-black-50 text-left">
                  <div><?=$account->email?></div>
               </div>
               <div class="col text-right">
                  <a href="">Change email</a>
               </div>
            </div>
            <div class="row">
               <div class="col text-black-50 text-left">
                  <div>
                     Password: ********
                  </div>
               </div>
               <div class="col text-right">
                  <a href="">Change password</a>
               </div>
            </div>
            <div class="row">
               <div class="col text-black-50 text-left">
                  <div>
                     Phone: 479-696-1637
                  </div>
               </div>
               <div class="col text-right">
                  <a href="">Change phone number</a>
               </div>
            </div>
            <hr>
            <div class="row">
               <div class="col">
                  Billing (Coming Soon)
               </div>
            </div>
         </div>
      </div>
      <hr>
      <div class="row">
         <div class="col text-black-50">
            <h2>Settings</h2>
         </div>
         <div class="col">
            <div class="row px-3">
               Parental Controls (Coming Eventually)
            </div>
            <div class="row px-3">
               Manage Download Devices (Coming Eventually)
            </div>
            <div class="row px-3">
               <a href="addContent.php">Add Movies</a>
            </div>
            <div class="row px-3">
               <a href="delete.php">Remove Movies</a>
            </div>
            <div class="row px-3">
               <a href="api/logout.php">Sign out</a>
            </div>
         </div>
      </div>
      <hr>
      <div class="row">
         <div class="col text-black-50">
            <h2>My Profile</h2>
         </div>
         <div class="col">
            <div class="row">
               <div class="col text-left">
                  Profile Name and Icon (Coming Soon)
               </div>
               <div class="col text-right">
                  Manage Profiles (Coming Soon)
               </div>
            </div>
            <div class="row px-3">
               Subtitles (Coming Eventually)
            </div>
            <div class="row px-3">
               Playback Settings (Coming Eventually)
            </div>
            <div class="row px-3">
               Subtitle Appearance (Coming Eventually)
            </div>
         </div>
      </div>
   </div>

   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="" async defer></script>
</body>

</html>