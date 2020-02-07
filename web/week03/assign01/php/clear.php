<?php

session_start();
   $_SESSION["cart"] = json_encode(
      (object) [
         "address" => (object) [
            "street" => "",
            "city" => "",
            "state" => "",
            "zip" => "",
            "country" => ""
         ],
         "items" => [],
         "total" => 0
      ]
      );
?>