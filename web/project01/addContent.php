<?php

include "classes/account.php";

session_start();

$_SESSION["current"] = "addContent";

if (isset($_GET['success'])) {
   $success = $_GET['success'];
}

if (isset($_GET['error'])) {
   $error = $_GET['error'];
}

if (isset($_GET['title'])) {
   $title = $_GET['title'];
}

if (isset($_SESSION["account"])) {
   $account = $_SESSION["account"];
} else {
   header("location: index.php");
}

?>
<!DOCTYPE html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Add Movies</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/home.css">
   <script src="https://kit.fontawesome.com/79ad9f74b9.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php include "nav.php";

   if (isset($success)) { ?>

      <!-- Toast -->
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 60px; right: 0; float:left" data-autohide="false">
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
               echo "Failure to add $title to your collection with error: $error.";
            } ?>
         </div>
      </div>

   <?php } ?>

   <div class="container">
      <form class="was-validated" method="POST" action="api/insert.php">

         <div class="row">
            <!-- Movie Title -->
            <div class="col-md-4 mb-3 form-group">
               <label for="movieTitle">Movie Title</label>
               <input type="text" class="form-control is-valid" id="movieTitle" placeholder="Movie Title" name="title" required>
               <div class="invalid-feedback">
                  What movie are we gonna watch?
               </div>
            </div>

            <!-- Movie Rating -->
            <div class="col-md-4 mb-3 form-group">
               <label for="ratingSelect">Movie Rating</label>
               <select class="custom-select is-valid" id="ratingSelect" name="rating" required>
                  <option value="">Select Rating</option>
                  <!-- add php here for selector items -->
                  <?php

                  // Get Ratings from data base
                  require "api/dbConnect.php";
                  $db = getBD();

                  // create query
                  $query = "SELECT * FROM common_lookup WHERE context = 'RATING';";
                  $state = $db->prepare($query);

                  // run query
                  $state->execute();

                  // get values and and pring them out with php to generate options
                  try {
                     while ($row = $state->fetch(PDO::FETCH_ASSOC)) {
                        $rating = $row["meaning"];
                        echo "<option value='$rating'>$rating</option>";
                     }
                  } catch (Exception $e) {
                     echo "Error with DB. Details: $e";
                  }

                  ?>
               </select>
               <div class="invalid-feedback">Choose a rating!</div>
            </div>

            <!-- Movie creation Year -->
            <div class="col-md-4 mb-3 form-group">
               <label for="yearMade">Year Made</label>
               <select class="form-control is-valid" id="yearMade" name="year" required>
                  <option value="">Select Year</option>
                  <?php

                  $i = date("Y");
                  while ($i > 1887) {
                     echo "<option value='$i'>$i</option>";
                     $i--;
                  }

                  ?>
               </select>
               <div class="invalid-feedback">
                  Please provide a valid year.
               </div>
            </div>
         </div>

         <!-- Movie Description -->
         <div class="row">
            <div class="col mb-3 form-group">
               <label for="movieDescription">Movie Description</label>
               <textarea class="form-control is-valid" id="movieDescription" placeholder="Required example textarea" name="desc" required></textarea>
               <div class="invalid-feedback">
                  Please enter a movie description in the textarea.
               </div>
            </div>
         </div>

         <!-- <div class="row">
            Switch for Url or file
            <div class="col mb-3 custom-control custom-switch">
               <input type="checkbox" class="custom-control-input" id="customSwitch1">
               <label class="custom-control-label" for="customSwitch1">Toggle for URL Image or File (.png, .jpg, etc...)</label>
            </div> -->

         <!-- Image URL -->
         <div class="row">
            <div class="col mb-3 form-group">
               <input type="text" class="form-control is-valid" id="movieImageURL" placeholder="Movie Image URL" name="image" required>
               <div class="invalid-feedback">
                  We need to have a pretty cover picture!
               </div>
            </div>
         </div>

         <!-- Image File
            <div class=" col mb-3 custom-file hidden">
               Comming Soon!
               <input type="file" class="custom-file-input" id="movieImage" placeholder="Choose file..." name="file" disabled>
               <label class="custom-file-label" for="movieImage">Select a Movie Image</label>
               <div class="invalid-feedback">We need to have a pretty picture!</div>
            </div>
         </div>

         Movie Image
         <div class="custom-file">
            <input type="file" class="custom-file-input" id="movieFile" placeholder="Choose file..." name="file" disabled>
            <label class="custom-file-label" for="movieFile">Select a Movie mp4</label>
            <div class="invalid-feedback">We need to have a movie to watch!</div>
         </div> -->

         <!-- Submit Button -->
         <div class="row justify-content-center">
            <div class="col-auto">
               <button class="btn btn-success" type="submit" name="add">Add Movie</button>
            </div>
         </div>
      </form>
   </div>

   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="js/modal.js" async defer></script>
</body>

</html>