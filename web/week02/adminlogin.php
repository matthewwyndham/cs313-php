<?php session_start() ?>
<?php 
$_SESSION['user'] = 'Administrator';
header("Location: /week02/home.php");
?>