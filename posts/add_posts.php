<?php
session_start();
require_once('../connect.php');
mysqli_report(MYSQLI_REPORT_STRICT);
$title=$_POST['title'];
$survey=$_POST['survey'];
$type=$_POST['type'];
$owner=$_SESSION['login'];
$photo=$_FILES['photo'];
$data=date("Y-m-d");
$range_low = $_POST['range_low'];
$range_high = $_POST['range_high'];


    
     	 function create_slug($string){
     	 $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
     	 return $slug;
     	}
     	 $url = create_slug($_POST['title']);
     	
      



move_uploaded_file($photo['tmp_name'], '../uploads/'.$photo['name']);
$path = 'uploads/'.$photo['name'];

$add=$conn->query("INSERT INTO storage(`owner`, `data`, `type`, `survey`, `photo`, `title`, `od`, `do`, `url`)
VALUES ('$owner','$data','$type','$survey','$path','$title', '$range_low', '$range_high', '$url')");


if($add){
	$_SESSION['win']="Twoje ogłoszenie zostało dodane do poczekalni.";
	header('location:../ogloszenia.php');
}
else {
	$_SESSION['lose']="Nie udało się dodać twojego ogłoszenia do poczekalni";
	header('location:../ogloszenia.php');
}

?>