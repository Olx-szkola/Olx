<?php
session_start();
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
	
	$wyszukaj = $_POST['wyszukaj'];
	
	require_once('like/show.php');
    mysqli_select_db($conn, 'olx');
    $results_per_page = 10;
    $zapytanie = "SELECT * FROM POSTS";
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

    $sql="SELECT * FROM POSTS WHERE type LIKE '%$wyszukaj%' ORDER BY data DESC LIMIT " . $this_page_first_result . ',' .  $results_per_page;
    $result = mysqli_query($conn, $sql);
	
	
	
	
	
	
	
	
	
    foreach($result as $post): ?>
    
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
<a class="page-link" href="szukaj_nazwa.php?page='  . $page_ode .  '"" aria-label="Previous">
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
    echo ' <li class="page-item"><a class="page-link"  id='.$page_spr .' href="szukaj_nazwa.php?page='  . $page_spr .  '">' . $page_spr . '</a></li>'; }   


echo '<a class="page-link"  href="szukaj_nazwa.php?page='  . $page_dod .  '" aria-label="Next">
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
  
        
        
        
  