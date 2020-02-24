<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4">

   <!-- Navbar brand -->
   <a class="navbar-brand" href="home.php">McMovies</a>

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
         <li class="nav-item dropdown 
            <?php if ($_SESSION["current"] == "account") {
               echo "active";
            } ?>">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
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
                  } ?>" href="profiles.php" aria-disabled="true">Switch Profiles</a>

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
      <form class="form-inline" method="POST" action="api/search.php">
         <div class="md-form my-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="searchForWhat">
            <button class="btn btn-primary" type="submit" name="search">
               <i class="fas fa-search text-black" aria-hidden="true"></i>
            </button>
         </div>
      </form>
   </div>
   <!-- Collapsible content -->

</nav>
<!--/.Navbar-->