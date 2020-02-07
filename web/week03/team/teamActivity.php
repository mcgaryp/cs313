<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Team Activity</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   </head>
   <body class="container">
      <form action="emailDisplay.php" method="post">
         <div class="form-group">
            <label for="inputName">Name</label> 
            <input type="text" class="form-control" id="inputName" name="name">
         </div>
         <div class="form-group">
            <label for="inputEmail">Email</label> 
            <input type="email" class="form-control" id="inputEmail" name="email">
         </div>
         <div class="form-group form-check">
            <label for="inputMajor">Major</label>
            <div id="inputMajor" class="form-check">
               <?php 
                  $majors = ["Computer Science", "Web Design & Development", "Computer Information Technology", "Computer Engineer"];
                  foreach($majors as $major) {
                     echo "<input type='radio' class='form-check-input' name='$major' value='$major' id='$major'>
                  <label for='$major' class='form-check-label'>$major</label><br>";
                  }
               ?>
            </div>
         </div>
         <div class="form-group">
            <label for="inputComments">Comments</label> 
            <textarea id="inputComments" class="form-control" name="comments"></textarea>
         </div>
         <div class="form-group form-check">
            <label for="inputContinent">Continent</label>
            <div class="form-check" id="inputContinent">
               <input type="checkbox" name="continent[]" class="form-check-input" value="northAmerica" id="northAmerica">
               <label for="northAmerica" class="form-check-label">North America</label><br>
               <input type="checkbox" name="continent[]" class="form-check-input" value="southAmerica" id="southAmerica">
               <label for="southAmerica" class="form-check-label">South America</label><br>
               <input type="checkbox" name="continent[]" class="form-check-input" value="europe" id="europe">
               <label for="europe" class="form-check-label">Europe</label><br>
               <input type="checkbox" name="continent[]" class="form-check-input" value="asia" id="asia">
               <label for="asia" class="form-check-label">Asia</label><br>
               <input type="checkbox" name="continent[]" class="form-check-input" value="australia" id="australia">
               <label for="australia" class="form-check-label">Austrailia</label><br>
               <input type="checkbox" name="continent[]" class="form-check-input" value="africa" id="africa">
               <label for="africa" class="form-check-label">Afria</label><br>
               <input type="checkbox" name="continent[]" class="form-check-input" value="antarctica" id="antarctica">
               <label for="antarctica" class="form-check-label">Antarctica</label>
            </div>
         </div>
         <button type="submit" class="btn btn-primary" id="submit">Submit</button>
      </form>
      <script src="" async defer></script>
   </body>
</html>