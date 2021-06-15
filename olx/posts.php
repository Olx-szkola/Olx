<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('html_includes/header.php'); ?>
	
  </head>
  <body>

  <?php
  	$url = $_GET['title'];
  	$id = $_GET['id'];
  	require_once('like/show.php');
    mysqli_select_db($conn, 'olx');
    $zapytanie = "SELECT * FROM POSTS WHERE `id` = $id";
    $query = mysqli_query($conn,$zapytanie);
    $wynik = $query->fetch_assoc();
  ?>

  <div class="photo-container"><img id="post-photo" src="<?php echo $wynik['photo'] ?>"></div>
  <div class="post-owner-container"><p id="owner-title">Użytkownik</p><img id="post-avatar" src="uploads/avatar.png">&nbsp;<h2 id="owner-margin"><?php echo $wynik['owner'] ?></h2></div>
  <div class="post-container"><div class="l-size">Data dodania:&nbsp;<?php echo $wynik['data'] ?></div>
  <br>
  <div class="ad-font"><h2><?php echo $wynik['title'] ?></h2></div>
  <div class="oddo-font"><strong><?php echo $wynik['od']."  "."zł"." "." "."-"."  ".$wynik['do']." "."zł" ?></strong></div>
  <br>
  <button type="button" class="btn btn-outline-success"><?php echo $wynik['type']?></button>
  <br>
  <br>
  <h3>Opis</h3>
  <div class="survey-margin"><?php echo $wynik['survey']?></div>
  <hr>
  <div id="post-id" class="l-size">ID:&nbsp;<?php echo $wynik['id'] ?></div>
  </div>
  </body>
  </html>