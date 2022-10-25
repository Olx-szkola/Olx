<?php
session_start();
$id_posta = $_POST['id_posta'];
$_SESSION['id_posta'] = $id_posta;

require_once('../connect.php');
mysqli_report(MYSQLI_REPORT_STRICT);




$add=$conn->query("INSERT INTO posts(`owner`, `data`, `type`, `survey`, `photo`, `title`, `od`, `do`, `url`) SELECT owner, data, type, survey, photo, title, od, do, url FROM storage WHERE `id` = '$id_posta'");
$delete=$conn->query("DELETE FROM storage WHERE `id` = '$id_posta'");

if($add){
  $_SESSION['win']="Twój post został dodany do tablicy.";
  header('location:../storage.php');
}
else {
  $_SESSION['lose']="Nie udało się dodać twojego posta";
  header('location:../storage.php');
}

?>