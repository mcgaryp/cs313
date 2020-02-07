<?php
   session_start();

   if (isset($_POST["book"])) {
      $_SESSION["book"] = $_POST["book"];
   }

   if (isset($_POST["chapter"])) {
      $_SESSION["chapter"] = $_POST["chapter"];
   }

   if (isset($_POST["verse"])) {
      $_SESSION["verse"] = $_POST["verse"];
   } 

   if (isset($_SESSION["book"])) {
      $searchBook = $_SESSION["book"];
   }

   if (isset($_SESSION["chapter"])) {
      $searchChapter = $_SESSION["chapter"];
   }

   if (isset($_SESSION["verse"])) {
      $searchVerse = $_SESSION["verse"];
   }
?>

<!DOCTYPE html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="">
   </head>
   <body>
      <h1>Scripture Resources</h1>
      <?php
         print_r($_SESSION . "<br>");
         echo $searchBook;
         echo $searchChapter;
         echo $searchVerse;
         // require "dbConnect.php";
         // $db = getBD();

         // $scripture = $db->prepare("SELECT * FROM scripture");
         // $scripture->execute();
         
         // while($sRow = $scripture->fetch(PDO::FETCH_ASSOC)) {
         //    $book = $sRow["book"];
         //    $chapter = $sRow["chapter"];
         //    $verse = $sRow["verse"];
         //    $content = $sRow["content"];

         //    echo "<p><strong>$book $chapter:$verse</strong>-\"$content\"</p>";
         // }
      ?>
      <form action="" method="post">
         <input type="text" name="book" placeholder="John">
         <input type="number" name="chapter" placeholder="1">
         <input type="number" name="verse" placeholder="9">
         <input type="submit" name="search" value="Search">
      </form>
      <script src="" async defer></script>
   </body>
</html>