function callDelete(movieId) {
   console.log("made it to the ajax");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         if (xhttp.response == 1)
            window.location.assign("home.php");
         else {
            // Failed to delete
            console.log("Failed to delete");
         }
      }
   }
   xhttp.open("POST", "api/delete.php?movieId=" + movieId, true);
   xhttp.send();
   
}