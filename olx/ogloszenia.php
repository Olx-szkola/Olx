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
    <form>
    <div class="header">
    <div class="header_prefluid">
    <div class="header_fluid">

    <a href="index.php"><img class="header_logo" src="uploads/logo2.png"></a>

    <input class="form-control me-2 search_bar" type="search" placeholder="szukaj: np: tynkarz" aria-label="Search" autocomplete="off" disabled>
    <button class="btn btn-primary btn_color search_btn"><i class="fas fa-search"></i></button>
    </form>
    <a class="a_box " href="log_rej.php">
    <i class="far fa-user icon"></i>
    <span class="">Zmień dane <br> logowania</span></a>
    <?php

      if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
         {
           echo "<a class='a_box_logout' href='logout.php'><i class='fas fa-sign-out-alt icon_logout'></i>&nbsp;Wyloguj</a>";
         }

    ?>
    </div>
    </div>
    </div>
    <div class="h1_fluid"><h1>Dodaj nowe ogłoszenie</h1></div>
    <div class="add_ad">
    <form action="posts/add_posts.php" method="POST" enctype="multipart/form-data">
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
        <option value="cieśla">Cieśla</option>
        <option value="akrobata">akrobata</option>
    </select>
    <button type="submit" name="send" class="btn btn-outline-success btn_float" id="btn_submit">Wyślij</button>
    </div>
    <script type="text/javascript">
      function check(){
      var check = document.getElementById("survey").value;
      var area = document.getElementById("survey");
      var long = check.length;
      var btn = document.getElementById("btn_submit");
      if(long>9000)
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
    <br><div class="ad_text"><strong>Wystawiający:&nbsp;<?php echo $post['owner'] ?></strong></div>
    <br><div class="ad_text"><strong>Data dodania:&nbsp;<?php echo $post['data'] ?></strong></div>
    <br><div class="ad_text"><strong>Rodzaj działalności:&nbsp;<?php echo $post['type']?></strong></div>
    <button class="btn btn-outline-success btn_up ad_text" id="btn_show">Zmień dane posta</button>
    <div  class="collapsible"><i class="fas fa-chevron-down icon_col"></i></div>
    <div id="index" class="content"><p>Opis:</p><?php echo $post['survey']?></div>

    </div>

    
    <?php endforeach; ?>
    <script src="colapse.js" type="text/javascript">
    </script>
  </body>
  </html>


      </div>
      </div>
    </div>
</body>
</html>
