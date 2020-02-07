<?php 
   // start session
   session_start();
   // save session variables into local variables
   $c = $_SESSION["favColor"];
   $a = $_SESSION["favAnimal"];
?>
<h1>Your favorite color is <?=$c?> and your favorite animal is <?=$a?> <?php // use the session variables ?></h1>
<?php
   if (isset($_SESSION["pictureUrl"])) { ?>
      <h3>Again just for kicks from a form</h3> 
      <img src="<?=$_SESSION['pictureUrl']?>">
<?php } ?>