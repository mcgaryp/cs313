function callDelete(movieId) {
   var xhttp = new XMLHttpRequest();
   xhttp.open("POST", "api/delete.php?movieId=" + movieId, true);
   xhttp.send();
}