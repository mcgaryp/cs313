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
      <li class="nav-item active">
         <a class="nav-link" href="home.php">Home <span class="sr-only"><?php if ($_SESSION["current"] == "home") { echo "(current)"; }?></span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="accountSettings.php">Account<span class="sr-only"><?php if ($_SESSION["current"] == "account") { echo "(current)"; }?></span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="addContent.php">Add Movies<span class="sr-only"><?php if ($_SESSION["current"] == "addContent") { echo "(current)"; }?></span></a>
      </li> 
      
      <!-- Dropdown -->
      <!-- <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">Dropdown</a>
         <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
         <a class="dropdown-item" href="#">Action</a>
         <a class="dropdown-item" href="#">Another action</a>
         <a class="dropdown-item" href="#">Something else here</a>
         </div>
      </li> -->

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