<?php

include "classes/account.php";

session_start();

$_SESSION["current"] = "addContent";
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
   <form class="was-validated" method="POST" action="api/insert.php">
      <div class="mb-3">
         <label for="validationTextarea">Textarea</label>
         <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
         <div class="invalid-feedback">
            Please enter a message in the textarea.
         </div>
      </div>

      <div class="custom-control custom-checkbox mb-3">
         <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
         <label class="custom-control-label" for="customControlValidation1">Check this custom checkbox</label>
         <div class="invalid-feedback">Example invalid feedback text</div>
      </div>

      <div class="custom-control custom-radio">
         <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
         <label class="custom-control-label" for="customControlValidation2">Toggle this custom radio</label>
      </div>
      <div class="custom-control custom-radio mb-3">
         <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
         <label class="custom-control-label" for="customControlValidation3">Or toggle this other custom radio</label>
         <div class="invalid-feedback">More example invalid feedback text</div>
      </div>

      <div class="form-group">
         <select class="custom-select" required>
            <option value="">Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
         </select>
         <div class="invalid-feedback">Example invalid custom select feedback</div>
      </div>

      <div class="custom-file">
         <input type="file" class="custom-file-input" id="validatedCustomFile" required>
         <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
         <div class="invalid-feedback">Example invalid custom file feedback</div>
      </div>
      <button class="btn btn-primary" type="submit" name="add">Submit form</button>
   </form>

   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="" async defer></script>
</body>

</html>