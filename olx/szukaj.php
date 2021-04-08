<?php
session_start();


if(isset($_POST['select_murarz'])){
	$select_murarz = $_POST['select_murarz'];
}
else{
	$select_murarz = NULL;
}


if(isset($_POST['select_tynkarz'])){
	$select_tynkarz = $_POST['select_tynkarz'];
}
else{
	$select_tynkarz = NULL;
}

if(isset($_POST['select_płytkarz'])){
	$select_płytkarz = $_POST['select_płytkarz'];
}
else{
	$select_płytkarz = NULL;
}

if(isset($_POST['select_cieśla'])){
	$select_cieśla = $_POST['select_cieśla'];
}
else{
	$select_cieśla = NULL;
}

if(isset($_POST['select_akrobata'])){
	$select_akrobata = $_POST['select_akrobata'];
}
else{
	$select_akrobata = NULL;
}
	
	

require_once('connect.php');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $view=$conn->query("SELECT * FROM POSTS WHERE type IN ('$select_murarz', '$select_tynkarz', '$select_płytkarz', '$select_cieśla', '$select_akrobata' ) ORDER BY data DESC");
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('html_includes/header.php'); ?>
  </head>
  <body style="background color:  #f2f2f2;">
    <form action="szukaj_nazwa.php" method="post">
    <div class="header" id="headerSticky">
    <div class="header_prefluid">
    <div class="header_fluid">

    <a href="index.php"><img class="header_logo" src="uploads/logo2.png"></a>

    <input class="form-control me-2 search_bar" type="search" placeholder="szukaj: np: tynkarz" name="wyszukaj" aria-label="Search">
    <button type="submit" class="btn btn-primary btn_color search_btn"><i class="fas fa-search"></i></button>
    </form>

    <a class="a_box " href="log_rej.php">
    <i class="far fa-user icon"></i>
    <span class="h_span">Zaloguj się <br> Załóż konto</span></a>
    <?php

      if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
         {
           echo "<a class='a_box_ad' href='ogloszenia.php'><i class='far fa-address-card icon_ad'></i>&nbsp;Twoje ogłoszenia</a>";
           echo "<a class='a_box_logout' href='logout.php'><i class='fas fa-sign-out-alt icon_logout'></i>&nbsp;Wyloguj</a>";

         }

    ?>
    </div>
    </div>
    </div>
    <div class="filtr_container"><form action="szukaj.php" method="post"><h3 style="margin-left: 30px">
    <br><strong><label class="container">&nbsp; Murarz<input type='checkbox' name="select_murarz" value="murarz"/><span class="checkmark"></span></label></strong>
    <strong><label class="container">&nbsp; Tynkarz<input type='checkbox' name="select_tynkarz" value="tynkarz"/><span class="checkmark"></span></label></strong>
    <strong><label class="container">&nbsp; Płytkarz<input type='checkbox' name="select_płytkarz" value="płytkarz"/><span class="checkmark"></span></label></strong>
	<strong><label class="container">&nbsp; Cieśla<input type='checkbox' name="select_cieśla" value="cieśla"/><span class="checkmark"></span></label></strong>
	<strong><label class="container">&nbsp; Akrobata<input type='checkbox' name="select_akrobata" value="akrobata"/><span class="checkmark"></span></label></strong>
	</h3>
    <input type="submit" name="submit" value="Filtruj" class="btn btn-primary btn_width btn_color"/>
	</form> 
	</div>
	
    <div class="h1_fluid"><h1>Wyniki wyszukiwania</h1></div>
    <?php
    foreach($view as $post): ?>
    
    <div class="new_ad_box"><img class="ad_img" src='<?php echo $post['photo']?>'>
    <br><div class="ad_text"><strong>Wystawiający:&nbsp;<?php echo $post['owner'] ?></strong></div>
    <br><div class="ad_text"><strong>Data dodania:&nbsp;<?php echo $post['data'] ?></strong></div>
    <br><div class="ad_text"><strong>Rodzaj działalności:&nbsp;<?php echo $post['type']?></strong></div>
    <div  class="collapsible"><i class="fas fa-chevron-down icon_col"></i></div>
    <div id="index" class="content"><p>Opis:</p><?php echo $post['survey']?></div>
    </div>
    
    <?php endforeach; ?>
    <script src="colapse.js" type="text/javascript">
    </script>
    <script type="text/javascript">
      var element1 = document.getElementsByClassName("collapsible")[0];
      var element2 = document.getElementsByClassName("fas")[0];
      function zmien(){
        if(document.getElementById("collapsible").value == 0)
        {
          element2.classList.remove("fa-chevron-down");
          element2.classList.add("fa-chevron-up");
        }
        else
        {
          element2.classList.remove("fa-chevron-up");
          element2.classList.add("fa-chevron-up");
        }
      }

    </script>
	
	<script type="text/javascript">
	window.onscroll = function() {myFunction()};
	
	var header = document.getElementById("headerSticky");
	var sticky = header.offsetTop;
	
	function myFunction() {
		if (window.pageYOffset > sticky) {
			header.classList.add("sticky");
		} else {
			header.classList.remove("sticky");
		}
	}
	</script>

  </body>
  </html>
  
        
        
        
  