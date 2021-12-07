<?php
session_start();
$id_posta = $_SESSION['id_posta'];

require_once('../connect.php');
mysqli_report(MYSQLI_REPORT_STRICT);

$survey=$_POST['survey'];
$type=$_POST['type'];
$owner=$_SESSION['login'];
$photo=$_FILES['photo'];
$data=date("Y-m-d");



move_uploaded_file($photo['tmp_name'], '../uploads/'.$photo['name']);
$path = 'uploads/'.$photo['name'];

$add=$conn->query("UPDATE posts(`owner`, `data`, `type`, `survey`, `photo`)
VALUES ('$owner','$data','$type','$survey','$path') WHERE `id` = '$id_posta'");

$add=$conn->query("UPDATE posts SET `owner`='$owner', `data`='$data', `type`='$type', `survey`='$survey', `photo`='$path' WHERE `id` = '$id_posta'");

if($add){
	$_SESSION['win']="Twoje ogłoszenie zostało dodane.";
	header('location:../ogloszenia.php');
}
else {
	$_SESSION['lose']="Nie udało się dodać twojego ogłoszenia";
	header('location:../ogloszenia.php');
}

?>