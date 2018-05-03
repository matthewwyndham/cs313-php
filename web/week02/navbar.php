        <!-- Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Week 02 : Work Together</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  About Me
              </a>
              <div class="dropdown-menu p-4 text-muted">
                  <?php
                    $string = file_get_contents("text.json");
                    $json = json_decode($string, true);
                  
                    echo '<p>' . $json['AboutMeFirst']['text'] . '</p>';
                    echo '<p>' . $json['AboutMeSecond']['text'] . '</p>';
                   ?>
              </div>
              </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Assignments</a>
            </li>
          </ul>
        </div>
    </div>
</nav>