<?php
session_start();
require_once('../connect.php');
mysqli_report(MYSQLI_REPORT_STRICT);

$survey=$_POST['survey'];
$type=$_POST['type'];
$owner=$_SESSION['login'];
$photo=$_FILES['photo'];
$data=date("Y-m-d");



move_uploaded_file($photo['tmp_name'], '../uploads/'.$photo['name']);
$path = 'uploads/'.$photo['name'];

$add=$conn->query("INSERT INTO posts(`owner`, `data`, `type`, `survey`, `photo`)
VALUES ('$owner','$data','$type','$survey','$path')");

if($add){
	$_SESSION['win']="Twoje ogłoszenie zostało dodane.";
	header('location:../ogloszenia.php');
}
else {
	$_SESSION['lose']="Nie udało się dodać twojego ogłoszenia";
	header('location:../ogloszenia.php');
}

?>