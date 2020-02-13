<?php
// Build some kind of object to pass back to the javascript

   class Movie
   {
      public $image;
      public $title;
      public $description;
      public $rating;
      public $year;

      function Movie($id, $image, $title, $description, $rating, $year)
      {
         $this->id = $id;
         $this->image = $image;
         $this->title = $title;
         $this->description = $description;
         $this->rating = $rating;
         $this->year = $year;
      }
   }
   
?>