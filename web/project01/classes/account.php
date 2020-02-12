<?php

// Account class object
   class Account {
      public $id;
      public $username;
      public $password;
      public $email;

      function Account($id, $user, $pass, $email) {
         $this->id = $id;
         $this->username = $user;
         $this->password = $pass;
         $this->email = $email;
      }
   }

?>