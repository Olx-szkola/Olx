<?php
session_start();
require_once('../connect.php');
mysqli_report(MYSQLI_REPORT_STRICT);
$email = $_POST['email'];
$survey = $_POST['survey'];
$id_post = $_POST['id_post'];
$date = date("Y-m-d");
$like = $_POST['like'];
$add=$conn->query("INSERT INTO comments(`email`, `text`, `id_post`, `like`)
VALUES ('$email','$survey','$id_post','$like')");
if($add){
	$_SESSION['win']="Twój komentarz został dodany.";
	header('location:../posts.php'.$_SESSION['link']);
}
else {
	$_SESSION['lose']="Nie udało się dodać twojego komentarza";
	header('location:../posts.php'.$_SESSION['link']);
}
?>