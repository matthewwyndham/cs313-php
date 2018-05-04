<?php session_start() ?>
<?php 
$_SESSION['user'] = 'Tester';
header("Location: /week02/home.php");
?>