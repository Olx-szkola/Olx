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

$photos1=$_FILES['photos1'];
$photos2=$_FILES['photos2'];
$photos3=$_FILES['photos3'];



move_uploaded_file($photo['tmp_name'], '../uploads/'.$photo['name']);
$path = 'uploads/'.$photo['name'];

	if($photos1['size'] > 0){
		move_uploaded_file($photos1['tmp_name'], '../uploads/'.$photos1['name']);
		$paths1 = 'uploads/'.$photos1['name'];
	}
	
	if($photos2['size'] > 0){
		move_uploaded_file($photos2['tmp_name'], '../uploads/'.$photos2['name']);
		$paths2 = 'uploads/'.$photos2['name'];
	}
	
	if($photos3['size'] > 0){
		move_uploaded_file($photos3['tmp_name'], '../uploads/'.$photos3['name']);
		$paths3 = 'uploads/'.$photos3['name'];
	}

$add=$conn->query("UPDATE posts(`owner`, `data`, `type`, `survey`, `photo`, `photos1`, `photos2`, `photos3`)
VALUES ('$owner','$data','$type','$survey','$path', '$paths1', '$paths2', '$paths3') WHERE `id` = '$id_posta'");

$add=$conn->query("UPDATE posts SET `owner`='$owner', `data`='$data', `type`='$type', `survey`='$survey', `photo`='$path', `photos1`='$paths1', `photos2`='$paths2', `photos3`='$paths3' WHERE `id` = '$id_posta'");

if($add){
	$_SESSION['win']="Twoje ogłoszenie zostało dodane.";
	header('location:../ogloszenia.php');
}
else {
	$_SESSION['lose']="Nie udało się dodać twojego ogłoszenia";
	header('location:../ogloszenia.php');
}

?>