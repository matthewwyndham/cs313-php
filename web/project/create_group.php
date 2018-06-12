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
  if(isset($_POST['new_group'])) {
      $statement = "INSERT INTO teams (name) VALUES (:new_group)";
      $sq = $db->prepare($statement);
      $sq->bindvalue(':new_group', $_POST['new_group'], PDO::PARAM_STR);
      $sq->execute();
      
      $group_id = $db->lastInsertId('teams_id_seq');
      $s2 = "INSERT INTO user_team (teamid, userid, isAdmin) values (:teamid, :userid, TRUE)";
      $sq2 = $db->prepare($s2);
      $sq2->bindvalue(':teamid', $group_id, PDO::PARAM_INT);
      $sq2->bindvalue(':userid', $_SESSION['user'], PDO::PARAM_INT);
      $sq2->execute();
  }  
    header('Location: groups.php');
    die();
?>