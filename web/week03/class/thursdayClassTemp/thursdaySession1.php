<?php
   // Start the session
   session_start();
?>
<!DOCTYPE html>
<html>
   <body>
      <?php
         // remove previous session variable
         unset($_SESSION["pictureUrl"]);
         // Set session variables
         $_SESSION["favColor"] = "green";
         $_SESSION["favAnimal"] = "dog";
         $_SESSION["favGame"];
         // echo that variables have been set
         echo "Session variables have been set";
?>
      <a href="thursdaySession2.php">Check the variables on another page</a>
<h3>Just for kicks, lets try this with a form</h3>
<form action="" method="post">
   <input type="text" name="picture">
   <input type="submit" name="submit" value="Submit!">
</form>
      <?php // set session variables using a form 
         if (isset($_POST["submit"])) {
            $_SESSION["pictureUrl"] = $_POST["picture"];
         }
      ?>
   </body>
</html>