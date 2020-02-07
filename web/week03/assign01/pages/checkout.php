<?php 
   session_start();

   $count = 0;
   $items = [];
   $cart = json_decode($_SESSION["cart"]);
   foreach($cart->items as $item) {
      $count++;
      array_push($items, $item);
   }
?>

<!doctype html>
<!-- template taken from bootstrap and modified -->
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

   <title>Checkout</title>

   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container">
   <div class="py-5 text-center">

      <div class="row">
         <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
               <span class="text-muted">Your cart</span>
               <span class="badge badge-secondary badge-pill"><?=$count?></span>
            </h4>
            <ul class="list-group mb-3">
            <?php foreach($items as $item) { ?>
               <li class="list-group-item d-flex justify-content-between lh-condensed">
               <div>
                  <h6 class="my-0"><?=$item->title?></h6>
               </div>
               <span class="text-muted">$<?=$item->price?></span>
               </li>
            <?php } ?>
            </ul>

            <div class="card p-2">
               <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                     <div>
                        <h6 class="my-0">Tax</h6>
                     </div>
                     <span class="text-muted">$<?= $tax = number_format($cart->total * 0.08, 2) ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                     <div class="input-group-append">
                        <h6 class="my-0">Total</h6>
                     </div>
                     <div>
                        <span id="total" class="text-muted">$<?=$cart->total + $tax?></span>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-8 order-md-5">
            <h4 class="mb-3">Billing/Shipping address</h4>
            <form class="needs-validation" novalidate action="confirmation.php" method="POST">
               <div class="row">
               <div class="col-md-6 mb-3">
                  <label for="firstName">First name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="Billy" value="" required>
                  <div class="invalid-feedback">
                     Valid first name is required.
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <label for="lastName">Last name</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Farns" value="" required>
                  <div class="invalid-feedback">
                     Valid last name is required.
                  </div>
               </div>
               </div>

               <div class="mb-3">
               <label for="address">Address</label>
               <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
               <div class="invalid-feedback">
                  Please enter your shipping address.
               </div>
               </div>

               <div class="row">
               <div class="col-md-5 mb-3">
                  <label for="country">Country</label>
                  <select class="custom-select d-block w-100" id="country" required>
                     <option value="">Choose...</option>
                     <option>United States</option>
                  </select>
                  <div class="invalid-feedback">
                     Please select a valid country.
                  </div>
               </div>
               <div class="col-md-4 mb-3">
                  <label for="state">State</label>
                  <select class="custom-select d-block w-100" id="state" required>
                     <option value="">Choose...</option>
                     <option>California</option>
                  </select>
                  <div class="invalid-feedback">
                     Please provide a valid state.
                  </div>
               </div>
               <div class="col-md-3 mb-3">
                  <label for="zip">Zip</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                     Zip code required.
                  </div>
               </div>
               </div>
               <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
            </form>
            <a href="viewCart.php"><button class="btn btn-secondary btn-lg btn-block" style="margin-top: 5px">Return to Cart</button></a>
         </div>
      </div>
   </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>

