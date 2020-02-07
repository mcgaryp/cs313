<?php 
   session_start();

   $myCart = json_decode(file_get_contents('php://input'));
   $myCart->address->street = htmlspecialchars($myCart->address->street);
   $myCart->address->city = htmlspecialchars($myCart->address->city);
   $myCart->address->state = htmlspecialchars($myCart->address->state);
   $myCart->address->zip = htmlspecialchars($myCart->address->zip);
   $myCart->address->country = htmlspecialchars($myCart->address->country);
   $myCart->total = htmlspecialchars($myCart->total);

   $_SESSION["cart"] = json_encode($myCart);

?>