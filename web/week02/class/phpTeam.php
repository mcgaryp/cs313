<!DOCTYPE html>
<head>
   <title>PHP Team Activity</title>
   <meta charset="UTF-8">
   <meta content="Some team activity during class" name="description">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
</head>
<body>
<?php 
   function set() {
      for ($i = 0; $i < 20; $i++) {
         $x = $i % 10;
         if ($i % 2)
            echo "<div class'column'>This is div #$x</div>";
         else
            echo "<div style='color: red'>This is div #$x</div>";
      }
   }
?>
<div class="columns">
   <?php set()?>
   <?php set()?>
</div>
</body>