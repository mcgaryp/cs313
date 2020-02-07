<?php
   require "dbConnect.php";
   $db = getBD();

   $family_members = $db->prepare("SELECT * FROM family_members");
   $family_members->execute();
   
   while($fRow = $family_members->fetch(PDO::FETCH_ASSOC)) {
      $fName = $fRow["first_name"];
      $lName = $fRow["last_name"];
      $relationshipID = $fRow["relationships_id"];

      $relationships = $db->prepare("SELECT description FROM relationships WHERE id = $relationshipID");
      $relationships->execute();

      while ($rRow = $relationships->fetch(PDO::FETCH_ASSOC)) {
         $relationship = $rRow["description"];
      }

      echo "<p>$fName $lName is my $relationship($relationshipID)</p>";
   }

?>