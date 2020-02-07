<?php

// Build some kind of object to pass back to the javascript
class Movie {
   public $image;
   public $title;
   public $description;
   public $rating;
   public $year;

   function Movie($image, $title, $description, $rating, $year) {
      $this->image = $image;
      $this->title = $title;
      $this->description = $description;
      $this->rating = $rating;
      $this->year = $year;
   }
}

// Get data from db
require_once "dbConnect.php";
$db = getBD();

// Just get some of the movies preparation
$movieDB = $db->prepare("SELECT * FROM movie m INNER JOIN movie_group mg on m.movie_id = mg.movie_id AND mg.account_id = 2");
$movieDB->execute();

// Create array to hold all the users movies
$movies = array();

// Pass it into the object
while($row = $moviesDB->fetch(PDO::FETCH_ASSOC)) {
   $movie = new Movie($row["image"], $row["title"], $row["description"], $roe["rating"], $row["year"]);
   array_push($movies, $movie);
}

// Set object in session
$_SESSION["Movies"] = $movies;

// Redirect to home.php
header("location:../home.php")

?>