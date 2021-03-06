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
    if(isset($_SESSION['user'])) { 
        $username = $_SESSION['user_name']; 
        $userid = $_SESSION['user']; 
        $teamid = $_SESSION['teamid'];
        $isadmin = $_SESSION['isadmin'];
        if(isset($_POST['post_content'])) {
            $query = "INSERT INTO posts (userid, teamid, title, content, posttime) VALUES (:userid, :teamid, :post_title, :post_content, :time)";
            $stmt = $db->prepare($query);
            $stmt->bindvalue(':userid', $userid, PDO::PARAM_INT);
            $stmt->bindvalue(':teamid', $teamid, PDO::PARAM_INT);
            $stmt->bindvalue(':post_title', htmlspecialchars($_POST["post_title"]), PDO::PARAM_STR);
            $stmt->bindvalue(':post_content', htmlspecialchars($_POST["post_content"]), PDO::PARAM_STR);
            $stmt->bindvalue(':time', date('Y-m-d H:i:s'), PDO::PARAM_STR);
            $stmt->execute();
        }
    }
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
                <?php if(isset($isadmin)) {
                            if($isadmin) {
                                echo '<h1>Add a User to this Group</h1>';
                                echo '<form action="add_user.php" method="post">
                                        <div class="form-group">
                                            <label for="user_email">User Email</label>
                                            <input name="user_email" type="text" class="form-control" id="user_email" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <p>Privilege Level:</p>
                                            <input name="privilege" type="radio" id="p_user" value="p_user" checked>
                                            <label for="p_user">User</label>
                                            <br/>
                                            <input name="privilege" type="radio" id="p_admin" value="p_admin">
                                            <label for="p_admin">Admin</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form><hr/>';
                            }
                        } 
                ?>
                <?php if(isset($userid)) {
                    echo '<h1>New Post</h1>
                    <form action="home.php" method="post">
                        <div class="form-group">
                            <label for="post_title">Title</label>
                            <input name="post_title" type="text" class="form-control" id="post_title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Post</label>
                            <input name="post_content" type="text" class="form-control" id="post_content" placeholder="Content">
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>';
                    
                    
                } ?>
            </div>
            <div id="content">
                <?php            
                    if(isset($userid)) {
                        $get_posts = "SELECT users.name AS username, teams.name AS teamname, posts.id, posts.posttime, posts.title, posts.content, posts.teamid FROM posts INNER JOIN users ON posts.userid = users.id INNER JOIN teams ON posts.teamid = teams.id WHERE posts.teamid = :search";
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
                            echo $row['username'];
                            echo " : ";
                            # team name
                            echo $row['teamname'];
                            echo '</h6>'; # end username and team

                            echo '<div clas="card-text">';
                            echo $row['content'];    
                            echo '</div>'; # end card-text
                            
                            #echo '<a href="#" class="btn btn-primary float-right">Reply</a>'; 
                            
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
