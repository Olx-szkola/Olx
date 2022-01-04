<?php
session_start();



?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('html_includes/header.php'); ?>
	
  </head>
  <body>
  
  <div class="header" id="headerSticky">
    <div class="header_prefluid">
    <div class="header_fluid">
	
	<form action="szukaj_nazwa.php" method="get">
	
    <a href="index.php?page=1"><img class="header_logo" src="uploads/logo2.png"></a>

    <input class="form-control me-2 search_bar" type="search" placeholder="szukaj: np: tynkarz" name="wyszukaj" aria-label="Search">
    <button type="submit" class="btn btn-primary btn_color search_btn"><i class="fas fa-search"></i></button>
    </form>
	
	<?php
	if(!isset($_SESSION['zalogowany'])) 
	{
		echo "<a class='a_box ' href='log_rej.php'>";
		echo "<i class='far fa-user icon'></i>";
		echo " <span class='h_span'>Zaloguj się <br> Załóż konto</span></a>";
	}
	?>
	
	
	<div class="dropdown">
	 <?php

      if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
		{
	echo "<button onclick='dropdownList()' class='dropbutton' type='button'>Twoje konto<br></button>";
	echo "<div id='myDropdown' class='dropdown-content'>";
	echo "<a href='ogloszenia.php'>Twoje ogłoszenia</a>";
	echo "<a href='zmien_dane.php'>Zmień dane logowania</a>";
    echo "<a href='logout.php'>Wyloguj się</a>";
		}
	?>
	</div>
	</div>
	
	<script type="text/javascript">
	function dropdownList() {
	document.getElementById("myDropdown").classList.toggle("show");
	}

	
	window.onclick = function(event) {
	if (!event.target.matches('.dropbutton')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
		}
		}
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
	function count()
  {
    var total=document.getElementById("survey").value;
    total=total.replace(/\s/g, '');
    document.getElementById("total").innerHTML="Znaki: "+total.length+"/200";
  }
	</script>
	
    </div>
    </div>
    </div>

  <?php
  	$url = $_GET['title'];
  	$id = $_GET['id'];
  	require_once('like/show.php');
    mysqli_select_db($conn, 'olx');
    $zapytanie = "SELECT * FROM POSTS WHERE `id` = $id";
    $query = mysqli_query($conn,$zapytanie);
    $wynik = $query->fetch_assoc();
	
	$zlicz_like = "SELECT COUNT(*) as total FROM comments WHERE `like`=1 AND `id_post`= $id";
	$wynik_like = mysqli_query($conn,$zlicz_like);
	$suma_like = mysqli_fetch_assoc($wynik_like);
	
	$zlicz_dislike = "SELECT COUNT(*) as total FROM comments WHERE `like`=0 AND `id_post`= $id";
	$wynik_dislike = mysqli_query($conn,$zlicz_dislike);
	$suma_dislike = mysqli_fetch_assoc($wynik_dislike);

	if(isset($_SESSION['admin'])&& $_SESSION['admin']==1)
	{
		echo '<a href="storage.php"><div class="h1_fluid"><h1>Wróc do panelu</h1></div></a>';
	}
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
  <?php
  if($wynik['photos1'] != NULL || $wynik['photos2'] != NULL || $wynik['photos3'] != NULL)
  echo "<h3>Dodatkowe zdjęcia</h3>";
  ?>
  <div class="gallery">
  <div class="photo-gallery"><img class="myImg" id="gallery" src="<?php echo $wynik['photos1'] ?>"></div>
  <div class="photo-gallery"><img class="myImg" id="gallery" src="<?php echo $wynik['photos2'] ?>"></div>
  <div class="photo-gallery"><img class="myImg" id="gallery" src="<?php echo $wynik['photos3'] ?>"></div>
  
  
  <!-- The Modal -->
	<div id="myModal" class="modal">
	<span class="close">&times;</span>
	<img class="modal-content" id="img01">
	<div id="caption"></div>
	</div>
  
  
  <script type="text/javascript">
	var modal = document.getElementById('myModal');

	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var img = document.getElementsByClassName('myImg');
	var modalImg = document.getElementById("img01");
	

	var showModal = function(){
		modal.style.display = "block";
		modalImg.src = this.src;
		captionText.innerHTML = this.alt;
	}

	for (var i = 0; i < img.length; i++) {
		img[i].addEventListener('click', showModal);
	}

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
		modal.style.display = "none";
	}
  </script>
  
  
  </div>
  <hr>
  <div class="post_desc_bot">
  <div id="post-id" class="l-size">ID:&nbsp;<?php echo $wynik['id'] ?></div>
  <div class="licznik_like">
  <i class="fas fa-thumbs-up"> </i><?php echo $suma_like['total'] ?> &nbsp
  <i class="fas fa-thumbs-down"> </i><?php echo $suma_dislike['total'] ?>
  </div>
  </div>
  </div>
  </div>
   <div class="h1_fluid center"><h1>Komentarze</h1></div>
   <div class="post-container"><div class="l-size"></div>
   	<form action="comments/add_comment.php" method="post">
   		&nbsp;<label for="email" class="">Podaj email<span style="color:red">*</span></label>
   		<input type="email" class="form-control" oninput="checkmail();" id="exampleFormControlInput1" name="email" placeholder="gmail@gmail.com" id="email">
   		<br>
   		&nbsp;<label for="text" class="">Tekst komentarza<span style="color:red">*</span></label>
   		<textarea oninput="check();" onkeyup="count();" placeholder="Tekst" class="form-control" class="name" name="survey" cols="70%" rows="3" id="survey"></textarea>
   		<p id="total">Znaki: 0/200</p>
		
		<br>
		<p> Czy polecasz dane usługi?</p>	
		<input type="radio" name="like" value="1" class="like_btn" id="radio_id_1" checked><label class="like_label" for="radio_id_1"><i class="fas fa-thumbs-up"></i><span class="like_text">Polecam</span> 
		</label>
		&nbsp
		
		<input type="radio" name="like" value="0" class="dislike_btn" id="radio_id_0"><label for="radio_id_0" class="like_label"><i class="fas fa-thumbs-down"></i><span class="like_text">Nie polecam</span> 
		</label>
		
		<br><br>
   		<input  type="checkbox" value="" id="checkbox">&nbsp;Zaznacz jeżeli nie jesteś robotem<br><br>
   		<button type="submit" name="send" class="btn btn-outline-success" id="btn_submit">Wyślij</button>
   		<input type="hidden" name="id_post" value="<?php echo $wynik['id'] ?>">
   		
   		
    	
  		


   		


   		</div>   		
   	</form>
   	<script type="text/javascript">
      function check(){

      var check = document.getElementById("survey").value;
      var area = document.getElementById("survey");
      var long = document.getElementById("survey").value;
      long = long.replace(/\s/g, '');
      var btn = document.getElementById("btn_submit");
      if(long.length>200)
      {
        btn.setAttribute("disabled", true);
        area.classList.add("is-invalid");
      }
      else
      {
        area.classList.remove("is-invalid");
        btn.removeAttribute("disabled");
      }
    }
    
    </script>
    <form action="storage/delete_comments.php" method="post">
    <?php
	include('connect.php');
    $id_post =$wynik['id'];
    mysqli_select_db($conn, 'olx');
   	
    $vie=$conn->query("SELECT * FROM comments WHERE `id_post` = $id_post");

    foreach($vie as $com):
    ?>
    <div class="post-container"><div class="l-size"></div>
    <div class="com-block"><?php echo $com['text'] ?></div>
	<?php
	if($com['like']==1)
	{
	echo '<i class="fas fa-thumbs-up"></i>';
	}
	else if($com['like']==0)
	{
	echo '<i class="fas fa-thumbs-down"></i>';	
	}	
	if($_SESSION['admin']==1)
	{	
		echo "<button type='submit' name='send' class='btn btn-outline-success licznik_like' id='btn_submit'>usuń</button>";

	}
	?>

	
    <br><div class="ad_com l-size">Data dodania:&nbsp;<?php echo $com['data'] ?>&nbsp; email:&nbsp;<?php echo $com['email'] ?></div>
    <input type="hidden" name="id_com" value="<?php echo $com['id_comments']?>">
    <input type="hidden" name="id_post" value="<?php echo $wynik['id'] ?>">
	</div>
    <?php endforeach; ?>
	</form>
    
  </body>
  </html>