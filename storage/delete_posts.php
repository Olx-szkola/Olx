<?php
session_start();
$id_posta = $_POST['id_posta'];
$_SESSION['id_posta'] = $id_posta;

require_once('../connect.php');
mysqli_report(MYSQLI_REPORT_STRICT);




$add=$conn->query("DELETE FROM storage WHERE `id` = '$id_posta'");

if($add){
	$_SESSION['win']="Twój post został usunięty.";
	header('location:../storage.php');
}
else {
	$_SESSION['lose']="Nie udało usunąć twojego ogłoszenia";
	header('location:../storage.php');
}

?>