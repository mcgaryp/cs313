<?php
   // Retrieve POST data
   $email = htmlspecialchars($_POST["emailForPHP"]);
   $password = htmlspecialchars($_POST["passwordForPHP"]);

   // Do something with the data...
   echo "Here is your email $email, and your password is $password"; 
?>