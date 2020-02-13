<?php

include "classes/account.php";
include "classes/movie.php";

session_start();

$_SESSION["current"] = "deleteContent";
unset($_SESSION["extension"]);

if (isset($_GET['success'])) {
   $success = $_GET['success'];
}

if (isset($_GET['error'])) {
   $error = $_GET['error'];
}

if (isset($_POST['delete'])) {
   $delete = $_POST['delete'];
}

if (isset($_SESSION["account"])) {
   $account = $_SESSION["account"];
}
// } else {
//    header("location: index.php", true);
// }

?>
<!DOCTYPE html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Remove Movies</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/home.css">
   <script src="https://kit.fontawesome.com/79ad9f74b9.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php include "nav.php"; ?>

   <div class="container">
      <!-- What movie are we going to delete? -->
      <form action="removeContent.php" method="POST" class="was-validated">
         <div class="row">

               <!-- Title -->
               <div class="col-md-4 mb-3">
                  <input type="text" class="form-control is-valid" id="movieTitle" placeholder="Movie Title" name="title" required>
                  <div class="invalid-feedback">
                     What movie are we gonna remove from your library?
                  </div>
               </div>

               <!-- Button to confirm -->
               <div class="col-md-4 mb-3">
                  <button class="btn btn-warning" type="submit" name="delete">Delete</button>
               </div>

            </div>
      </form>
      <?php 
         if (isset($delete)) {
            if (isset($_POST["title"])) {
               $title = $_POST["title"];
            } else {
               echo "Failed to set";
               return;
            }
            
            echo $title;

            require "api/dbConnect.php";
            $db = getBD();
            // search database for title
            try {
               $query = 'SELECT * FROM movie m inner join movie_group mg on title = :title and mg.account_id = 2 and m.movie_id = mg.movie_id;';
               $state = $db->prepare($query);
               $state->bindValue(':title', $title);
               // $state->bindValue(':id', $account->id);
               $state->execute();

               $movies = array();

               while($row->fetch(PDO::FETCH_ASSOC)) {
                  echo "trying to add movie!";
                  $movie = new Movie($row["movie_id"], $row["image"], $row["title"], $row["description"], $row["rating"], $row["year"]);
                  array_push($movies, $movie);
                  echo "Added movie!";
               }
            } catch (Exception $e) {
               echo "Error with DB. Details: $e";
               die;
            }

            // display list of things that match that description
            foreach($movies as $movie) {
               echo "i found this many movies!";
            }
      ?>
            
      <?php } ?>
      <!-- Show List of Movies that have that title with option to delete-->
      
      <!-- Confirm that you want to delete it! -->

      <!-- delete movie -->

      <!-- delete relationship -->

   </div>

   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="" async defer></script>
</body>

</html>