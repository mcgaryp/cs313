<?php
	session_start();

   $cart = json_decode($_SESSION["cart"]);
   $items = json_decode(file_get_contents("../data/data.json"), true);

   function findItem($items, $id) {
      foreach($items as $element) {
         if ($id == $element["id"]) {
            return $element;
         }
      }
   }

   if (count($cart->items) == 0) {
      header("Location:../");
   } 
?>

<!DOCTYPE html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Checkout</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../../../shared/nav.css">
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
</head>
<body>
	
   <!-- Template taken from bootstrap and modified by me -->
   <div class="container">
      <table id="cart" class="table table-hover table-condensed">
			<thead>
				<tr>
					<th style="width:50%">Product</th>
					<th style="width:18%">Price</th>
					<!-- <th style="width:8%">Quantity</th> -->
					<th style="width:22%" >Subtotal</th>
					<th style="width:10%"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($cart->items as $cartItem) {?>
				<tr>
					<td data-th="Product">
						<div class="row">
							<div class="col-sm-2 hidden-xs"><img src="<?=$cartItem->url?>" alt="<?=$cartItem->title?>" class="img-responsive"/></div>
							<div class="col-sm-10">
								<h4 class="nomargin"><?=$cartItem->title?></h4>
								<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
							</div>
						</div>
					</td>
					<td data-th="Price"><?=$cartItem->price?></td>
					<!-- <td data-th="Quantity">
						<input type="number" class="form-control text-center" value="<?=$cartItem->quantity?>">
					</td> -->
					<td data-th="Subtotal"><?=$cartItem->subtotal?></td>
					<td class="actions" data-th="">
						<!-- <button type="submit" class="btn btn-info btn-sm">
							<i class="fa fa-refresh"></i>
						</button> -->
						<button item-id="<?=$cartItem->id?>" class="btn btn-danger btn-sm">
							<i class="fa fa-trash-o"></i>
						</button>								
					</td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr class="visible-xs">
					<td id="subtotal" class="text-center"><strong><?=$cart->total?></strong></td>
				</tr>
				<tr>
					<td><a href="../" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
					<td colspan="1" class="hidden-xs"></td>
					<td class="hidden-xs "><strong><?=$cart->total?></strong></td>
					<td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
				</tr>
			</tfoot>
		</table>
	</div>
	<script src="../script/base.js" async defer></script>
	<script src="../script/cart.js" async defer></script>
</body>
</html>