<?php
      $cookieName = "user";
      $cookieValue = "Porter McGary";
      setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/");
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Sessions and Cookies</title>
   </head>
   <body>
      <h1>Working with Cookies</h1>
      <img src="https://images-gmi-pmc.edge-generalmills.com/087d17eb-500e-4b26-abd1-4f9ffa96a2c6.jpg" alt="Trulli" width="500" height="333">
      <h3>Check if a single cookie exists and print it</h3>
      <?php
         // if cookie exists, echo it, otherwise echo that it doesn't have a value
         if (!isset($_COOKIE[$cookieName])) {
            echo "Cookie named $cookieName has not been set";
         }
         else {
            echo "Cookie named $cookieName is set";
            echo "Value is $_COOKIE[$cookieName]";
         } 
      ?>
      <h3>To print all cookies:</h3>
      <?php print_r($_COOKIE) ?>
      <h3><a href="thursdayCookie.php">Now...to another page</a></h3>
      <h1><a href="thursdaySession1.php">Working with Sessions</a></h1>
   </body>

</html>