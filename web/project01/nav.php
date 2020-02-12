<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4">

   <!-- Navbar brand -->
   <a class="navbar-brand" href="#">McMovies</a>

   <!-- Collapse button -->
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

   <!-- Collapsible content -->
   <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Links -->
      <ul class="navbar-nav mr-auto">
         
         <!-- Home -->
         <li class="nav-item 
            <?php if ($_SESSION["current"] == "home") {
               echo "active";
            } ?>">
            <a class="nav-link" href="home.php">Home <span class="sr-only">
                  <?php if ($_SESSION["current"] == "home") {
                     echo "(current)";
                  } ?></span></a>
         </li>

         <!-- Dropdown Account options-->
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle 
               <?php if ($_SESSION["current"] == "account/$extension") {
                  echo "active";
               } ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

               <!-- settings tab -->
               <a class="dropdown-item 
                  <?php if ($extension == "settings") {
                     echo "active";
                  } ?>" href="accountSettings.php">Account Settings</a>

               <!-- switch profile tab -->
               <a class="dropdown-item
                  <?php if ($extension == "settings") {
                     echo "active";
                  } ?>" href="" aria-disabled="true">Switch Profiles(Comming Soon)</a>

               <!-- logout tab -->
               <a class="dropdown-item" href="api/logout.php">Logout</a>

            </div>
         </li>

         <!-- Add movies -->
         <li class="nav-item 
            <?php if ($_SESSION["current"] == "addContent") {
               echo "active";
            } ?>">
            <a class="nav-link" href="addContent.php">Add Movies<span class="sr-only">
                  <?php if ($_SESSION["current"] == "addContent") {
                     echo "(current)";
                  } ?></span></a>
         </li>



      </ul>
      <!-- Links -->

      <!-- Search form -->
      <form class="form-inline">
         <div class="md-form my-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            <i class="fas fa-search text-black ml-3" aria-hidden="true"></i>
         </div>
      </form>
   </div>
   <!-- Collapsible content -->

</nav>
<!--/.Navbar-->