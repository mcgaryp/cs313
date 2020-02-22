function callDelete(movieId) {
   
   console.log("movieId=" + movieId);

   const xhttp = new XMLHttpRequest();

   xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         if (xhttp.response == 1)
            window.location.assign("home.php");
         else {
            // Failed to delete
            console.log(xhttp.response);
         }
      }
   }
   xhttp.open('POST', 'api/delete.php');
   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhttp.send("movieId=" + movieId);
   
}