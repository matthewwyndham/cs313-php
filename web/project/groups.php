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
    if(isset($_GET['team_choice'])) {$_SESSION['teamid'] = $_GET['team_choice']; $teamid = $_SESSION['teamid'];}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Groups</title>
    </head>
    <body>        
        <header><?php include 'header.php'?></header>
        <main>
            
            <div id="topmenu" class="jumbotron">
                <h1>Groups</h1>
                <p class="lead">Create a new team:</p>
                <div class="container">
                    <form action="groups.php" method="GET">
                        
                    </form>
                </div>
                <p class="lead">Select your team:</p>
                <form action="groups.php" method="GET">
                    <select name="team_choice"> 
                        <?php // TODO: change this so it only selects the groups the user is in.
                            $query = "SELECT teams.name, teams.id FROM teams WHERE teams.id IN (SELECT user_team.teamid FROM user_team WHERE user_team.userid = :user_id)";
                            $statement = $db->prepare($query);
                            $statement->execute(array('user_id' => $userid));
                            foreach ($statement as $row) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" value="change_team" class="btn btn-primary">
                </form>
            </div>
        </main>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>