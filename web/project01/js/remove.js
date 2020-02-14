function callDelete(movieId) {
   console.log("made it to the ajax");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         Window.location.href = xhttp.responseText;
      }
   }
   xhttp.open("POST", "api/delete.php?movieId=" + movieId, true);
   xhttp.send();
   console.log("request complete");
}

// https://web-engineering-2.herokuapp.com/project01/removeContent.php?../home.php