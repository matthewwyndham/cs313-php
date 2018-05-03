        <!-- Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Freddy's Frozen Tacos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php if($_SERVER["PHP_SELF"]=="/week02/home.php"){echo '<li class="nav-item active">';} else {echo '<li class="nav-item">';} ?>
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if($_SERVER["PHP_SELF"]=="/week02/about-us.php"){echo '<li class="nav-item active">';} else {echo '<li class="nav-item">';} ?>
              <a class="nav-link" href="about-us.php">About Us</a>
            </li>
              <?php if($_SERVER["PHP_SELF"]=="/week02/login.php"){echo '<li class="nav-item active">';} else {echo '<li class="nav-item">';} ?>
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
    </div>
</nav>