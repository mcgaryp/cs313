function callDelete(movieId) {
   console.log("made it to the ajax");
   var data = new FormData();
   data.append('movieId', movieId);

   var xhttp = new XMLHttpRequest();
   xhttp.open('POST', 'api/delete.php', true);
   xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         if (xhttp.response == 1)
            window.location.assign("home.php");
         else {
            // Failed to delete
            console.log("Failed to delete");
            console.log(xhttp.response);
         }
      }
   }
   xhttp.send('movieId=' + movieId);
   
}