<?php

include "classes/account.php";
include "classes/movie.php";

session_start();

$_SESSION["current"] = "searchResults";

print_r($_SESSION);

if (isset($_SESSION["account"])) {
   $account = $_SESSION["account"];
} else {
   header("location: index.php", true);
}

if (isset($_POST['results'])) {
   $movies = $_POST['results'];
} else {
   header("location: home.php", true);
}

?>
<!DOCTYPE html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Search Results</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/home.css">
   <script src="https://kit.fontawesome.com/79ad9f74b9.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php
   if (!empty($search)) {
      if (!empty($movies)) {
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
                                 <div class="modal-body">
                                    <p class="modal-title" id="<?= $movie->id ?>ModalLabel">
                                       Perminately DELETE <span class="text-weight-bolder text-danger"><?= $movie->title ?></span> from your library
                                    </p>
                                 </div>
                                 <div class="modal-footer">
                                    <div class="row justify-content-center">
                                       <div class="col-auto">
                                          <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                          <button type="button" class="btn btn-danger" onclick="callDelete(<?= $movie->id ?>)">Yes</button>
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

   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="js/modal.js" async defer></script>
   <script src="js/remove.js" async defer></script>
</body>

</html>