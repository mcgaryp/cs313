<?php

  if (isset($_SESSION["current"])) {
    $current = $_SESSION["current"];
  } else {
    echo "Failed to set current page";
  }

?>

<!--Navbar-->
<nav class="navbar navbar-dark amber lighten-4 mb-4">

  <img id="icon" src="../../pictures/emblemOfTheJediOrder.png" alt="Jedi Order Emblem">

  <!-- Navbar brand -->
  <div class="title" href="#">Jedi Masters of the Force</div>

  <!-- Collapse button -->
  <button class="navbar-button first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
    aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
    <div class="animated-icon1"><span></span><span></span><span></span></div>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent20">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php 
            if ($current == "index") {
              echo "active"; 
              }
          ?>">
        <a class="nav-link" href="../../index.php">Home
          <?php 
            if ($current == "index") {
              echo "<span class='sr-only'>(current)</span>"; 
              }
          ?>
        </a>
      </li>
      <li class="nav-item <?php 
            if ($current == "intro") {
              echo "active"; 
              }
          ?>">
        <a class="nav-link" href="../../intro.php">Introduction
          <?php 
            if ($current == "intro") {
              echo "<span class='sr-only'>(current)</span>"; 
            }
          ?>
        </a>
      </li>
      <li class="nav-item <?php 
            if ($current == "dir") {
              echo "active"; 
              }
          ?>">
        <a class="nav-link" href="../../directory.php">Directory
          <?php 
            if ($current == "dir") {
              echo "<span class='sr-only'>(current)</span>"; 
            }
          ?>
        </a>
      </li>
      <li class="nav-item <?php 
            if ($current == "assign01") {
              echo "active"; 
              }
          ?>">
        <a class="nav-link" href="./">Star Wars Shop (Assignment 01)
          <?php 
            if ($current == "assign01") {
              echo "<span class='sr-only'>(current)</span>"; 
            }
          ?>
        </a>
      </li>
    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->
</nav>