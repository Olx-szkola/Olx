<?php
session_start();



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

    <a href="index.php"><img class="header_logo" src="uploads/logo2.png"></a>

	<form action="szukaj_nazwa.php" method="get">

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
	
    </div>
    </div>
    </div>
    <div class="filtr_container"><form action="szukaj.php" method="get"><h3 style="margin-left: 30px">
    <br><strong><label class="container">&nbsp; Murarz<input type='submit' name="kategoria" value="murarz"/><span class="checkmark"></span></label></strong>
    <strong><label class="container">&nbsp; Tynkarz<input type='submit' name="kategoria" value="tynkarz"/><span class="checkmark"></span></label></strong>
    <strong><label class="container">&nbsp; Płytkarz<input type='submit' name="kategoria" value="płytkarz"/><span class="checkmark"></span></label></strong>
	<strong><label class="container">&nbsp; Cieśla<input type='submit' name="kategoria" value="cieśla"/><span class="checkmark"></span></label></strong>
	<strong><label class="container">&nbsp; Akrobata<input type='submit' name="kategoria" value="akrobata"/><span class="checkmark"></span></label></strong>
	</h3>
	</form> 
	</div>
	
    <div class="h1_fluid"><h1>Wyniki wyszukiwania</h1></div>
    <?php
	
	$kategoria = $_GET['kategoria'];
	
	

	require_once('like/show.php');
    mysqli_select_db($conn, 'olx');
    $results_per_page = 10;
    $zapytanie = "SELECT * FROM POSTS WHERE type IN ('$kategoria') ORDER BY data DESC";
    $wynik = mysqli_query($conn,$zapytanie);
    $number_of_results = mysqli_num_rows($wynik);

    


    $number_of_pages = ceil($number_of_results/$results_per_page);

    if(!isset($_GET['page'])){
      $page= 1;
    }
    else {
      $page = $_GET['page'];
    }

    $this_page_first_result = ($page-1)*$results_per_page;
	
	
	if($kategoria == NULL)
		{
			$sql = "SELECT * FROM POSTS ORDER BY data DESC LIMIT " . $this_page_first_result . ',' .  $results_per_page;
		}
	else
		{
			$sql = "SELECT * FROM POSTS WHERE type IN ('$kategoria') ORDER BY data DESC LIMIT " . $this_page_first_result . ',' .  $results_per_page;
		}
	$result = mysqli_query($conn, $sql);
	
	
	
	
	
	
	
	

    foreach($result as $post): ?>
    
    <div class="new_ad_box"><img class="ad_img" src='<?php echo $post['photo']?>'>
    <br><a href="posts.php?id=<?php echo $post['id']?>&title=<?php echo $post['url']?>"><div id="ad-title"><?php echo $post['title'] ?></div></a>
    <br>
    <button type="button" class="btn btn-outline-success btn-margin"><?php echo $post['type']?></button>
    <br>
    <br><div class="ad_text l-size">Data dodania:&nbsp;<?php echo $post['data'] ?></div>
    <div id="container-range">
    <div class="range-low"><strong><?php echo $post['od'] ?>&nbsp;zł&nbsp;-</div></strong>
    <div class="range-high"><strong><?php echo $post['do'] ?>zł</div></strong> 
    </div>   
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
	
	<div class="bot">
<div class="pagin">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
    
<?php
if($page >= 2){
$page_ode = $page - 1;
}
else 
{
$page_ode = $page;
}
echo '
<a class="page-link" href="szukaj.php?kategoria=' . $kategoria . '&page='  . $page_ode .  '"" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>';
if($page < $number_of_pages)
{
  $page_dod = $page + 1;
}
else
{
  $page_dod = $page;
}

for ($page_spr=1; $page_spr<=$number_of_pages; $page_spr++) {
    echo ' <li class="page-item"><a class="page-link"  id='.$page_spr .' href="szukaj.php?kategoria=' . $kategoria . '&page='  . $page_spr .  '">' . $page_spr . '</a></li>'; }   


echo '<a class="page-link"  href="szukaj.php?kategoria=' . $kategoria . '&page='  . $page_dod .  '" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>';
?>
</li>
  </ul>
</nav>
</div>
</div>
<script type="text/javascript">
var $_GET = <?php echo json_encode($_GET); ?>;
function załaduj(){
var page = document.getElementById(($_GET['page']));
page.classList.add("p_active");
}


</script>

  </body>
  </html>
  
        
        
        
  