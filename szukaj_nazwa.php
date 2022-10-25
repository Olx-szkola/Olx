<?php
session_start();

	$wyszukaj = $_GET['wyszukaj'];

	require_once('like/show.php');
	mysqli_select_db($conn, 'olx');
	
	$zlicz = "SELECT COUNT(*) as total FROM POSTS WHERE type LIKE '%$wyszukaj%' OR title LIKE '%$wyszukaj%'";
	$wynik_z = mysqli_query($conn,$zlicz);
	$suma = mysqli_fetch_assoc($wynik_z);


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
    <div class="filtr_container">
	<h2 class="cat_filter">Kategorie główne</h2>
	<form action="szukaj.php" method="get"><h3 class="cat_filter">
    <br>
	<strong><label class="container"><span style='font-size:28px;'>&rsaquo; </span><span class="cat_span">Murarz</span><input type='submit' name="kategoria" value="murarz"/></label></strong>
    <strong><label class="container"><span style='font-size:28px;'>&rsaquo; </span><span class="cat_span">Tynkarz</span><input type='submit' name="kategoria" value="tynkarz"/></label></strong>
    <strong><label class="container"><span style='font-size:28px;'>&rsaquo; </span><span class="cat_span">Płytkarz</span><input type='submit' name="kategoria" value="płytkarz"/></label></strong>
	<strong><label class="container"><span style='font-size:28px;'>&rsaquo; </span><span class="cat_span">Cieśla</span><input type='submit' name="kategoria" value="cieśla"/></label></strong>
	<strong><label class="container"><span style='font-size:28px;'>&rsaquo; </span><span class="cat_span">Akrobata</span><input type='submit' name="kategoria" value="akrobata"/></label></strong>
	<label><button type="submit" name="kategoria" value="" class="btn_filter_reset"> Resetuj filtr</button></label>
	</h3>
	</form> 
	</div>
	
    <div class="h1_fluid"><h1>Wyniki wyszukiwania: <?php echo $suma['total'] ?></h1></div>
	
	
    <?php
	if($suma['total'] == 0)
	{
		echo "<div class='h1_fluid'><h1>Brak wyników do podanych parametrów :(</h1></div>";
	}
	

	
	
    $results_per_page = 10;
    $zapytanie = "SELECT * FROM POSTS WHERE type LIKE '%$wyszukaj%' OR title LIKE '%$wyszukaj%' ORDER BY data DESC";
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

    $sql="SELECT * FROM POSTS WHERE type LIKE '%$wyszukaj%' OR title LIKE '%$wyszukaj%' ORDER BY data DESC LIMIT " . $this_page_first_result . ',' .  $results_per_page;
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
<a class="page-link" href="szukaj_nazwa.php?wyszukaj=' .$wyszukaj. '&page='  . $page_ode .  '"" aria-label="Previous">
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
    echo ' <li class="page-item"><a class="page-link"  id='.$page_spr .' href="szukaj_nazwa.php?wyszukaj=' .$wyszukaj. '&page='  . $page_spr .  '">' . $page_spr . '</a></li>'; }   


echo '<a class="page-link"  href="szukaj_nazwa.php?wyszukaj=' .$wyszukaj. '&page='  . $page_dod .  '" aria-label="Next">
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
  
        
        
        
  