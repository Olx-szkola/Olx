<?php
session_start();
if(!isset($_SESSION['zalogowany'])) 
{
  header('Location: index.php');
  exit();
}
if(isset($_SESSION['zalogowany']))
{
  $_SESSION['logon'] = "<div class='alert alert-success ' role='alert'>Witaj!&nbsp;"."<a href='log_rej.php'>".$_SESSION['login']."</a>"."&nbsp;Zostałeś zalogowany do panelu admina</div>";
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
  
  </script>
  
  </div>
  </div>
    </div>
    </div>
    </div>
    <form action="posts/add_posts.php" method="POST" enctype="multipart/form-data">
    
          
      
      
      
      
      
 
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

    <div class="h1_fluid"><h1>Kolejka do tablicy</h1></div>
    <?php
    require_once('storage/storage_show.php');
    foreach($view as $post): ?>
    
    <div class="new_ad_box"><img class="ad_img" src='<?php echo $post['photo']?>'>
    <br><a href="content.php?id=<?php echo $post['id']?>&title=<?php echo $post['url']?>"><div id="ad-title"><?php echo $post['title'] ?></div></a>
    <br>
    <br>
    <br><div class="ad_text l-size">Data dodania:&nbsp;<?php echo $post['data'] ?></div>   
  <form method="post" action="storage/edit_storage.php">
  <input type="hidden" name="id_posta" value="<?php echo $post['id'] ?>">
  <div id="wrap">
    <button type="submit" class="btn btn-outline-success btn_up btn-rework-first" id="btn_show">Dodaj posta do tablicy</button>
    </form>
  <br>

  <form method="post" action="storage/delete_posts.php">
  <input type="hidden" name="id_posta" value="<?php echo $post['id'] ?>">
    <button type="submit" class="btn btn-outline-success btn_up btn-rework-second" id="btn_show">Usuń post</button>
    </form>
    </div>
    </div>

  

    
    <?php endforeach; ?>

    <div class="h1_fluid"><h1>Posty istniejace na tablicy</h1></div>
    <?php
    require_once('like/show.php');
    foreach($view as $post): ?>
    
    <div class="new_ad_box"><img class="ad_img" src='<?php echo $post['photo']?>'>
    <br><a href="posts.php?id=<?php echo $post['id']?>&title=<?php echo $post['url']?>"><div id="ad-title"><?php echo $post['title'] ?></div></a>
    <br>
    <br>

  <form method="post" action="storage/admin_post_delete.php">
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
