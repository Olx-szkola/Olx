<?php
session_start();
$id_com = $_POST['id_com'];
$id = $_POST['id_post'];
require_once('../connect.php');
mysqli_report(MYSQLI_REPORT_STRICT);




$add=$conn->query("DELETE FROM comments WHERE `id_comments` = '$id_com'");

if($add){
	$_SESSION['win']="Twój komentarz został usunięty.";
	header('location:../posts.php'.$_SESSION['link']);
}
else {
	$_SESSION['lose']="Nie udało usunąć twojego komentarza";
	header('location:../posts.php'.$link);
}

?>