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
    if(isset($_SESSION['user_name'])) { $username = $_SESSION['user_name']; }
    if (isset($_GET['user_email'])) {
        $query = "SELECT users.id, users.email, users.password FROM users WHERE users.email = :user_email AND users.password = :user_password";
        $statement = $db->prepare($query);
        $statement->bindvalue(':user_email', $_GET['user_email'], PDO::PARAM_STR);
        $statement->bindvalue(':user_password', $_GET['user_password'], PDO::PARAM_STR);
        $statement->execute();
        foreach($statement as $user) {$_SESSION['user'] = $user['id']; $_SESSION['user_name'] = $user['name']; break;}
        $username = $_SESSION['user_name'];
    } else {;}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Login</title>
    </head>
    <!-- BODY OF THE POST -->
    <body>        
        <header><?php include 'header.php'?></header>
        <main>
            
            <div id="topmenu" class="jumbotron">
                <p><?php var_dump($user); ?></p>
                <p><?php echo 'User id: '.$_SESSION['user'].', username:'.$_SESSION['user_name']; ?></p>
                <h1>Login</h1>
                <?php if(!isset($username)) {
                    echo '<p class="lead">Please enter your credentials:</p>
                    <form class="p-4" action="login.php" method="get">
                        <div class="form-group">
                            <label for="user_email">Email address</label>
                            <input name="user_email" type="email" class="form-control" id="user_email" placeholder="email@example.com">
                        </div>
                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input name="user_password" type="password" class="form-control" id="user_password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>';
} else {
    echo "<p>Hello $username </p>";
} ?>
            </div>
        </main>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>