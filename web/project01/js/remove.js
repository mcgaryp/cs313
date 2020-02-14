function callDelete(movieId) {
   var data = new FormData();
   data.append('movieId', movieId);
   
   var xhttp = new XMLHttpRequest();
   xhttp.open('POST', 'api/delete.php', true);
   xhttp.onload = function () {
         if (xhttp.response == 1)
            window.location.assign("home.php");
         else {
            // Failed to delete
            console.log("Failed to delete");
            console.log(xhttp.response);
         }
      }
   }
   xhttp.send(data);
}