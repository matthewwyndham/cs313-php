<!doctype html>

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

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Scripture Resources</title>

</head>

    <body>
        <h1>Scripture Resources</h1>
        <h2>Stretch Challenges</h2>
        <form>
            <select>
                <?php
                foreach ($db->query('SELECT book FROM scriptures') as $row) {
                    echo '<option value="' . $row . '">' . $row . '</option>';
                }
                ?>
            </select>
        </form>
        
        <h2>Core Requirements</h2>
        <?php
        foreach ($db->query('SELECT * FROM scriptures') as $row)
        {
          echo '<p><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "' . $row['content'] . '"</p>';
        }
        ?>
    </body>
</html>

