<?php
	require("dbConnect.php");
	$db = get_db();
?>
	<body>
		<div class="container">
         <?php

            // retrieve url parameter
            $userId = $_GET["personId"];
            
            // execute query to pull up data from that id
            $query = 'SELECT * FROM w6_user WHERE id = :personalId';
            $statement = $db->prepare($query);
            $statement->bindValue(':personId',$userId);
            $statement->execute();

            // execute another query to get food data
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
               $id = $row['id'];
               $first = $row['last'];
               $last = $row['first'];
               $food_id = $row['food_type'];

               $query = 'SELECT food FROM w6_food WHERE id = :food_id';
               $state = $db->prepare($query);
               $state->bindValue(':food_id', $food_id);
               $state->execute();
               
               $food;
               
               while($row = $state->fetch(PDO::FETCH_ASSOC)) {
                  $food = $row['food'];
               }
               
               // display name and favorite food
               echo "<h1>$first $last's favorite food is $food</h1>";
            }

         ?>

		</div>
	</body>
</html>