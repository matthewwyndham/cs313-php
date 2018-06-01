<?php session_start(); ?>
<?php
    # this only works for Heroku
    # but it's really nice
    $dbUrl = getenv('DATABASE_URL');

    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
    if(isset($_SESSION['user'])) { $username = $_SESSION['user_name']; $userid = $_SESSION['user']; $teamid = $_SESSION['teamid'];}
?>

<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Work Chatter</title>
        <meta name="description" content="Keep up with coworkers!">
        <meta name="author" content="Wyndham">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <header><?php include 'header.php'?></header>
        <main>
            <div id="leftmenu"></div>
            <div id="topmenu" class="jumbotron">
                
            </div>
            <div id="content">
                <?php            
                    if(isset($userid)) {
                        $get_posts = "SELECT users.name, teams.name, posts.id, posts.posttime, posts.title, posts.content, posts.teamid FROM posts INNER JOIN users ON posts.userid = users.id INNER JOIN teams ON posts.teamid = teams.id WHERE posts.teamid = :search";
                        $stmt = $db->prepare($get_posts);
                        $stmt->execute(array('search' => $teamid));

                        foreach ($stmt as $row)
                        {   
                            echo '<div class="container" id="';
                            echo $row['id']; # for use with subposts
                            echo '">';
                            echo '<div class="card">';

                            echo '<div class="card-header">';
                            echo $row['posttime'];
                            echo '</div>'; # end header

                            echo '<div class="card-body">';

                            echo '<h5 class="card-title">'.$row['title'].'</h5>'; # title of post

                            # username, and team
                            echo '<h6 class="card-subtitle mb-2 text-muted">';
                            # username
                            echo $row['name'];
                            echo " : ";
                            # team name
                            echo $row['name'];
                            echo '</h6>'; # end username and team

                            echo '<div clas="card-text">';
                            echo $row['content'];    
                            echo '</div>'; # end card-text
                            
                            echo '<a href="#" class="btn btn-primary float-right">Reply</a>'; 
                            
                            echo '</div>'; # end card-body

                            echo '</div>'; # end card
                            echo '</div>'; # end container
                        }
                    } else {
                        echo '<div class="container"><p>You must log in</p></div>';
                    }
                ?>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>
