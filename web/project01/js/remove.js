function callDelete(movieId) {
   console.log("made it to the ajax");
   var xhttp = new XMLHttpRequest();
   xhttp.open("POST", "api/delete.php?movieId=" + movieId, true);
   xhttp.send();
   console.log("request complete");
}