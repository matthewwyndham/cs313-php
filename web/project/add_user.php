<?php 
    session_start();
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
    if(isset($_POST['user_email'])) {
        $query1 = "SELECT users.id FROM users WHERE users.email = :newuser";
        $query2 = "INSERT INTO user_team (teamid, userid, isAdmin) values (:teamid, :userid, :isAdmin)";
        $pq1 = $db->prepare($query1);
        $pq1->bindvalue(':newuser', $_POST['user_email'], PDO::PARAM_STR);
        $pq1->execute();
        foreach($pq1 as $result) {
            $new_user_id = $result['id'];
            break;
        }
        if(isset($new_user_id)) {
            $pq2 = $db->prepare($query2);
            $pq2->bindvalue(':teamid', $_SESSION['teamid'], PDO::PARAM_INT);
            $pq2->bindvalue(':userid', $new_user_id, PDO::PARAM_INT);
            if($_POST['privilege'] == "p_admin") {
                $is_admin = TRUE;
            } else {
                $is_admin = FALSE;
            }
            $pq2->bindvalue(':isAdmin', $is_admin, PDO::PARAM_BOOL);
            $pq2->execute();
        }
    }
    
echo "<p>New User: $new_user_id, $is_admin</p>";

//    header('Location: home.php');
//    die();
?>