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
            <div id="topmenu">
                <p>Create a Post</p>
            </div>
            <div id="content">
                <?php
                    foreach ($db->query("SELECT * FROM posts") as $row)
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
                        $userid = $row['userid'];
                        foreach ($db->query("SELECT * FROM users WHERE id = '$userid'") as $username) {
                            echo $username['name'];
                            break;
                        } # TODO: Retrieve one line, is it possible?
                        echo " : ";
                        # team name
                        $teamid = $row['teamid'];
                        foreach ($db->query("SELECT * FROM teams WHERE id = '$teamid'") as $teamname) {
                            echo $teamname['name'];
                            break;
                        } # TODO: Retrieve one line, is it possible?
                        echo '</h6>'; # end username and team
                        
                        echo '<div clas="card-text">';
                        echo $row['content'];    
                        echo '</div>'; # end card-text
                        
                        echo '</div>'; # end card-body
                        
                        echo '</div>'; # end card
                        echo '</div>'; # end container
                    }
                ?>
            </div>
        </main>
    </body>
</html>
