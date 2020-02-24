<?php

class Profile {
   public $nickname;
   public $icon;

   function Profile($name,$image) {
      $this->nickname = $name;
      $this->icon = $image;
   }
}
?>