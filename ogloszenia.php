<?php
session_start();
if(!isset($_SESSION['zalogowany'])) 
{
  header('Location: index.php');
  exit();
}
if(isset($_SESSION['zalogowany']))
{
  $_SESSION['logon'] = "<div class='alert alert-success ' role='alert'>Witaj!&nbsp;"."<a href='log_rej.php'>".$_SESSION['login']."</a>"."&nbsp;Zostałeś zalogowany</div>";
  echo $_SESSION['logon'];
  unset($_SESSION['logon']);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('html_includes/header.php'); ?>
	
  </head>
  <body style="background color:  #f2f2f2;">
    
    <div class="header" id="headerSticky">
    <div class="header_prefluid">
    <div class="header_fluid">

    <a href="index.php?page=1"><img class="header_logo" src="uploads/logo2.png"></a>
	<form>
    <input class="form-control me-2 search_bar" type="search" placeholder="szukaj: np: tynkarz" aria-label="Search" autocomplete="off" disabled>
    <button class="btn btn-primary btn_color search_btn"><i class="fas fa-search"></i></button>
    </form>

	<div class="dropdown">
	<button onclick="dropdownList()" class="dropbutton" style="margin-top:-15px;" type="button">Twoje konto<br></button>
	<div id="myDropdown" class="dropdown-content">
	<a href="zmien_dane.php">Zmień dane logowania</a>
    <a href="logout.php">Wyloguj się</a>
	
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
	function count()
  {
    var total=document.getElementById("survey").value;
    total=total.replace(/\s/g, '');
    document.getElementById("total").innerHTML="Znaki: "+total.length+"/9000";
  }
	</script>
	
	</div>
	</div>
    </div>
    </div>
    </div>
    <form action="posts/add_posts.php" method="POST" enctype="multipart/form-data">
    <div class="h1_fluid"><h1>Dodaj nowe ogłoszenie</h1></div>
    <div class="add-ad-title">
      
      <strong><label for="survey" class="add_font">Dodaj Tytuł</label></strong>
      <br>
      <label  class="">Dodaj tytuł<span style="color:red">*</span></label>
      <div class="form-floating mb-3">
      <input type="text" class="form-control" id="title" name="title" placeholder="Tytuł">
     <label for="floatingInput">Tytuł:</label>
    </div>
    </div>
    <div class="add-ad-title">
      <strong><label for="survey" class="add_font">Dodaj zakres cen</label></strong>
      <br>
      <label  class="">Dodaj zakres cen<span style="color:red">*</span></label>
      <div class="form-floating mb-3">
    
      <input type="text" class="form-control short low-range" id="range_low" name="range_low" placeholder="Cena od"></input>
      
      <input type="text" class="form-control short high-range" id="range_high" name="range_high" label="jhgjh" placeholder="Cena do"></input>
      
      
      
      
     
    </div>
    </div>
    <div class="add_ad">
    <br/>
    <strong><label for="survey" class="add_font">Opis usługi</label></strong>
    <br>
    <label for="survey" class="">Opis usługi<span style="color:red">*</span></label>
    </br>
    <div class="form-floating">
    <textarea oninput="check();" onkeyup="count();" class="form-control" class="name" name="survey" cols="70%" rows="3" id="survey"></textarea>
    <label for="floatingTextarea">Opis:</label>
    </div>
    <p id="total">Znaki: 0/9000</p>
    </div>
    <div class="add_ad2">
    <strong><label for="survey" class="add_font">Rodzaj usługi i zdjęcie</label></strong>
    <br>
    <label for="survey" class="">Zdjęcie zalecamy 935x583<span style="color:red">*</span></label>
    <br>
    <div class="mb-3">
    <input class="form-control" type="file" id="formFile" type="file" class="name" name="photo">
    </div>
    <br>
    <label for="survey" class="">Rodzaj usługi<span style="color:red">*</span></label>
    <br>
    <select name="type" class="form-select" aria-label="Default select example">
        <option value="Murarz">Murarz</option>
        <option value="Tynkarz">Tynkarz</option>
        <option value="Płytkarz">Płytkarz</option>
        <option value="Cieśla">Cieśla</option>
        <option value="Akrobata">akrobata</option>
    </select>
    
	
    </div>
	<div class="add_ad2">
	<strong><label for="survey" class="add_font">Dodatkowe zdjęcia(opcjonalne)</label></strong>
	<br>
	<input class="form-control" type="file" id="formFile" type="file" class="name" name="photos1">
	<br>
	<input class="form-control" type="file" id="formFile" type="file" class="name" name="photos2">
	<br>
	<input class="form-control" type="file" id="formFile" type="file" class="name" name="photos3">
	<br>
	<button type="submit" name="send" class="btn btn-outline-success btn_float" id="btn_submit">Wyślij</button>
	</div>
	</form>
  <script type="text/javascript">
      function check(){

      var check = document.getElementById("survey").value;
      var area = document.getElementById("survey");
      var long = document.getElementById("survey").value;
      long = long.replace(/\s/g, '');
      var btn = document.getElementById("btn_submit");
      if(long.length>9000)
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

    <div class="h1_fluid"><h1>Twoje ogłoszenia</h1></div>
    <?php
    require_once('like/like.php');
    foreach($view as $post): ?>
    
    <div class="new_ad_box"><img class="ad_img" src='<?php echo $post['photo']?>'>
    <br><a href="posts.php?id=<?php echo $post['id']?>&title=<?php echo $post['url']?>"><div id="ad-title"><?php echo $post['title'] ?></div></a>
    <br>
    <br>
    <br><div class="ad_text l-size">Data dodania:&nbsp;<?php echo $post['data'] ?></div>   
	<form method="post" action="edytuj_ogloszenie.php">
	<input type="hidden" name="id_posta" value="<?php echo $post['id'] ?>">
  <div id="wrap">
    <button type="submit" class="btn btn-outline-success btn_up btn-rework-first" id="btn_show">Zmień dane posta</button>
    </form>
	<br>

	<form method="post" action="posts/delete_posts.php">
	<input type="hidden" name="id_posta" value="<?php echo $post['id'] ?>">
    <button type="submit" class="btn btn-outline-success btn_up btn-rework-second" id="btn_show">Usuń post</button>
    </form>
    </div>
    </div>

  

    
    <?php endforeach; ?>
    <script src="colapse.js" type="text/javascript">
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


      </div>
      </div>
    </div>
</body>
</html>
