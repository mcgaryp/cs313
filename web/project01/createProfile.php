<?php

include "classes/account.php";
include "classes/profile.php";

session_start();

$_SESSION["current"] = "profile";

if (isset($_SESSION["account"])) {
   $account = $_SESSION["account"];
   $profiles = $_SESSION["profiles"];
} else {
   header("location: index.php", true);
}

if (isset($_GET["success"])) {
   $success = $_GET["success"];
}

if (isset($_GET["error"])) {
   $error = $_GET["error"];
}


?>

<!DOCTYPE html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Home</title>
   <meta name="description" content="McMovies home page. Access all you home movie files from here">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/home.css">
   <script src="https://kit.fontawesome.com/79ad9f74b9.js" crossorigin="anonymous"></script>
</head>
<?php

if (isset($success)) { ?>

   <!-- Toast -->
   <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 60px; right: 0; z-index:10" data-autohide="false">
      <div class="toast-header">
         <!-- <img src="" class="rounded mr-2" alt="..."> -->
         <strong class="mr-auto"><?php if ($success) {
                                    echo "Successful";
                                 } else {
                                    echo "Failure";
                                 } ?></strong>
         <small>now</small>
         <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="toast-body">
         <?php if ($success) {
            echo "Successfully added $title to your collection.";
         } else {
            echo "$error.";
         } ?>
      </div>
   </div>

<?php } ?>

<div class="container">
   <form action="api/insert.php" method="POST" class="was-validated">
      <div class="row">
         <!-- nickname -->
         <div class="col-md-4 mb-3 form-group">
            <label for="profileNickname">Profile Nickname</label>
            <input type="text" class="form-control is-valid" id="profileNickname" placeholder="Darth Vader" name="nickname" required>
            <div class="invalid-feedback">
               Don't be evil now and pick a good name!
            </div>
         </div>

      </div>
      <div class="row">
         <!-- have an option to provide icon of there own!? -->
         <!-- place option toggle here -->

         <!-- Icon -->
         <div class="col-md-4 mb-3 form-group">
            <label for="profileIcon">Choose and Icon!</label>
            <select class="custom-select is-valid" id="profileIcon" name="icon" required>
               <option value="">Select Icon</option>
               <!-- add icons from the table generated! -->
               <?php

               require "api/dbConnect.php";
               $db = getBD();

               // create my query
               $query = "SELECT * FROM common_lookup WHERE context = 'ICON';";
               $state = $db->prepare($query);

               // run query
               $state->execute();

               // get the values
               try {
                  while ($row = $state->fetch(PDO::FETCH_ASSOC)) {
                     $icon = $row["meaning"];
                     $name = $row["type"];
                     echo "<option value='$icon'>$name</option>";
                  }
               } catch (Exception $e) {
                  echo "Error with DB. Details: $e";
                  die;
               }

               ?>
            </select>
            <div class="invalid-feedback">Choose a cool Icon!</div>
         </div>

         <!-- option to upload icon here if toggle pushed -->

      </div>
      <div class="row">
         <!-- Submit button -->
         <div class="row justtify-content-center">
            <div class="col-auto">
               <button class="btn btn-success" type="submit" name="addProfile">Create Profile</button>
            </div>
         </div>

      </div>
   </form>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/modal.js" async defer></script>
</body>

</html>