<!doctype html>

<?php session_start(); ?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>LIVING IN THE DATABASE</title>

</head>

<body>
    <p><a href="https://www.youtube.com/watch?v=_EQ4w8sXrYY" target="_blank">Inspirational Log Horizon Battle</a></p>
    <p>They live in the Database.</p>
    
    <h1>Example 1:</h1>
    <p>Get the database</p>
    <?php 
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
    

    <h1>Example 2:</h1>

    <?php
        foreach ($db->query('SELECT username, password FROM note_user') as $row)
        {
          echo 'user: ' . $row['username'];
          echo ' password: ' . $row['password'];
          echo '<br/>';
        }
    ?>

    <h1>Example 3:</h1>

    <?php
        $statement = $db->query('SELECT username, password FROM note_user');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
          echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
        }
    ?>

    <h1>Example 4:</h1>

    <?php
        $statement = $db->query('SELECT username, password FROM note_user');
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo 'results: ' . $results;
    ?>

    <h1>Example 5:</h1>

    <?php
        $stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo 'rows: ' . $rows;
    ?>

    <h1>Example 6:</h1>

    <?php
        $stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
        $stmt->execute(array(':name' => $name, ':id' => $id));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo 'rows: ' . $rows;
    ?>


</body>
</html>