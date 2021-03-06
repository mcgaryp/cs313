<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
require("dbConnect.php");
$db = get_db();
?>

<body>
   <div class="container" style="margin-top:50px;">
      <form action="insert.php" method="POST">
         <div class="form-row">
            <div class="col">
               <input type="text" class="form-control" placeholder="Book" name="book">
            </div>
            <div class="col">
               <input type="number" class="form-control" placeholder="Chapter" name="chapter">
            </div>
            <div class="col">
               <input type="number" class="form-control" placeholder="Verse" name="verse">
            </div>
            <div class="col">
               <textarea class="form-control" placeholder="Content" name content></textarea>
            </div>
            <div class="col">
               <select id="inputTopic" class="form-control" name="content">
                  <?php
                  $statement = $db->prepare("SELECT * FROM topic");
                  $statement->execute();
                  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                     $id   = $row['topic_id'];
                     $topic = $row['topic_name'];
                     echo "<option value='$id'>$topic</option>";
                  }
                  ?>
               </select>
            </div>
            <div class="col">
               <button class="btn btn-primary" type="submit">Save me some SCRIPTURE</button>
            </div>
         </div>
      </form>
   </div>
</body>