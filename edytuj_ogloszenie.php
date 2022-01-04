
<?php
session_start();

$id_posta = $_POST['id_posta'];
$_SESSION['id_posta'] = $id_posta;

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
    
    <div class="header">
    <div class="header_prefluid">
    <div class="header_fluid">

    <a href="index.php"><img class="header_logo" src="uploads/logo2.png"></a>
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
	
	</script>
	
	</div>
	</div>
    </div>
    </div>
    </div>
    <div class="h1_fluid"><h1>Edytuj swoje ogłoszenie</h1></div>
    <div class="add_ad">
    <form action="posts/edit_posts.php" method="POST" enctype="multipart/form-data">
    <br/>
    <strong><label for="survey" class="add_font">Opis usługi</label></strong>
    <br>
    <label for="survey" class="">Opis usługi<span style="color:red">*</span></label>
    </br>
    <div class="form-floating">
    <textarea onchange="check();" class="form-control"class="name" name="survey" cols="70%" rows="3" id="survey"></textarea>
    <label for="floatingTextarea">Opis:</label>
    </div>
    </div>
    <div class="add_ad2">
    <strong><label for="survey" class="add_font">Rodzaj usługi i zdjęcie</label></strong>
    <br>
    <label for="survey" class="">Zdjęcie<span style="color:red">*</span></label>
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

  </body>
  </html>


      </div>
      </div>
    </div>
</body>
</html>
