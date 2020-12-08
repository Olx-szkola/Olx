<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include('connect.php');

mysqli_report(MYSQLI_REPORT_STRICT);

$owner = $_SESSION['login'];

$view=$conn->query("SELECT * FROM POSTS WHERE OWNER = '$owner'");
$row = mysqli_fetch_array($view);
while($row = $view->fetch_assoc())

{
	$_SESSION['owner'] = $row['owner'];
	$_SESSION['data'] = $row['data'];
	$_SESSION['type'] = $row['type'];
	$_SESSION['survey'] = $row['survey'];
	$_SESSION['photo'] = $row['photo'];

}





?>