<?php

include "classes/account.php";
include "classes/movie.php";

session_start();

$_SESSION["current"] = "deleteContent";

if (isset($_GET['success'])) {
   $success = $_GET['success'];
}

if (isset($_GET['error'])) {
   $error = $_GET['error'];
}

if (isset($_POST['search'])) {
   $search = $_POST['search'];
}

if (isset($_POST['title'])) {
   $title = $_POST['title'];
}

if (isset($_GET['title'])) {
   $title = $_GET['title'];
}

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
   <title>Remove Movies</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/home.css">
   <script src="https://kit.fontawesome.com/79ad9f74b9.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php include "nav.php"; ?>

   <!-- Toast -->
   <div class="toast" style="position: absolute; top: 50; right: 0;">
      <div class="toast-header">
         <img src="..." class="rounded mr-2" alt="...">
         <strong class="mr-auto">Bootstrap</strong>
         <small>now</small>
         <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="toast-body">
         Hello, world! This is a toast message.
      </div>
   </div>

   <div class="container">
      <div class="row justify-content-center">
         <div class="col-auto">
            <!-- What movie are we going to delete? -->
            <form action="removeContent.php" method="POST" class="was-validated">
               <div class="row">

                  <!-- Title -->
                  <div class="col-auto mb-3">
                     <input type="text" class="form-control is-valid" id="movieTitle" placeholder="Movie Title" name="title" value="<?= $title ?>" required>
                     <div class="invalid-feedback">
                        What movie are we gonna remove from your library?
                     </div>
                  </div>

                  <!-- Button to confirm -->
                  <div class="cola-auto mb-3 pl-0">
                     <button class="btn btn-warning" type="submit" name="search">Delete</button>
                  </div>

               </div>
            </form>
         </div>
      </div>
      <?php
      if (isset($search) || $success == true) {

         require "api/dbConnect.php";
         $db = getBD();

         // search database for title
         try {
            $title = '%' . $title . '%';
            $query = 'SELECT * FROM movie WHERE title iLIKE :title and account_id = :id';
            $state = $db->prepare($query);
            $state->bindValue(':title', $title);
            $state->bindValue(':id', $account->id);
            $state->execute();

            $movies = array();

            while ($row = $state->fetch(PDO::FETCH_ASSOC)) {
               $movie = new Movie($row["movie_id"], $row["image"], $row["title"], $row["description"], $row["rating"], $row["year"]);
               array_push($movies, $movie);
            }
         } catch (Exception $e) {
            echo "Error with DB. Details: $e";
            die;
         } ?>

         <?php if (!empty($movies)) {
            $i = 1; ?>
            <!-- Show List of Movies that have that title with option to delete-->
            <table class="table table-striped table-hover">
               <thead class="thead-dark">
                  <th scope="col"></th>
                  <th scope="col">Cover Image</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Year Made</th>
                  <th scope="col">Rating</th>
                  <th scope="col"></th>
               </thead>
               <tbody>
                  <?php
                  foreach ($movies as $movie) { ?>
                     <tr>
                        <th scope="row" class="align-middle"><?= $i ?></th>
                        <td class="align-middle"><img src="<?= $movie->image ?>" alt="<?= $movie->title ?>" class="img-thumbnail"></td>
                        <td class="align-middle"><?= $movie->title ?></td>
                        <td class="align-middle"><?= $movie->description ?></td>
                        <td class="align-middle"><?= $movie->year ?></td>
                        <td class="align-middle"><?= $movie->rating ?></td>
                        <td class="align-middle">
                           <!-- Button trigger modal -->
                           <button type="button" class="btn btn-danger modal-button" data-toggle="modal" data-target="<?= $movie->id ?>">
                              <i class="fas fa-trash"></i>
                           </button>

                           <!-- Modal -->
                           <div class="modal fade" id="<?= $movie->id ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $movie->id ?>ModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>

                                    <!-- Confirm that you want to delete it! -->
                                    <div class="modal-body">
                                       <p class="modal-title" id="<?= $movie->id ?>ModalLabel">
                                          Perminately DELETE <span class="text-weight-bolder text-danger"><?= $movie->title ?></span> from your library
                                       </p>
                                    </div>
                                    <div class="modal-footer">
                                       <div class="row justify-content-center">
                                          <div class="row-auto">
                                             <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                             <!-- delete movie -->
                                             <form method="POST" action="api/delete.php">
                                                <input id="<?= $movie->id ?>" name="movieId" value="<?= $movie->id ?>" hidden>
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                     </tr>
                  <?php $i++;
                  } ?>
               </tbody>
            </table>
         <?php } else { ?>
            <div class="row justify-content-center">
               <div class="col-auto">
                  <h6 class="text-muted">Could not find your Movie</h6>
               </div>
            </div>
      <?php   }
      } ?>

   </div>


   </div>

   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="js/modal.js" async defer></script>
</body>

</html>