<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('html_includes/header.php'); ?>
  </head>
  <body style="background color:  #f2f2f2;">
    <form>
    <div class="header">
    <div class="header_prefluid">
    <div class="header_fluid">

    <a href="index.php"><img class="header_logo" src="uploads/logo2.png"></a>

    <input class="form-control me-2 search_bar" type="search" placeholder="szukaj: np: tynkarz" aria-label="Search" autocomplete="off">
    <button class="btn btn-primary btn_color search_btn"><i class="fas fa-search"></i></button>
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
    <div class="filtr_container"><h1>Filtry tutaj dodaj filtry razem z przyciskiem mozesz zrobić check boxy  z ikonkami z awesome font biblioteka wgrana btw. Zmien tekst z najnowszych postów na najnowsze(checkbox zawodu)</h1></div>
    <div class="h1_fluid"><h1>Najnowsze ogłoszenia</h1></div>
    <?php
    require_once('like/show.php');
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

  </body>
  </html>
  
        
        
        
  