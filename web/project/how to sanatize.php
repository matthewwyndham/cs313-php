<?php
try
{
    $dbUrl = getenv('DATABASE_URL');
    $dbopts = parse_url($dbUrl);
    
    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');
    
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Movies</h1>

    <ul>
<?php
$user_rating = $_GET["rating"];
$query = "SELECT m.title, m.year, r.code FROM movies m INNER JOIN ratings r ON m.rating_id = r.id WHERE r.code = :rating";
$statement = $db->prepare($query);
$statement->bindValue(":rating", $user_rating, PDO::PARAM_STR);
$statement->execute();
foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $movie)
{
    $title = $movie["title"];
    $year = $movie["year"];
    $rating = $movie["code"];
    
    echo "<li>$title ($year) - Rated $rating</li>";
}
?>
    </ul>

</body>
</html>