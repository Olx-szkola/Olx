<?php
session_start();
if(!isset($_SESSION['zalogowany'])) 
{
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('html_includes/header.php'); ?>
  </head>
  <body style="background color:  #f2f2f2;">
    <nav class="navbar navbar-expand-sm row container">
         <div class="col-12 col-md-12 col-lg-6 col-sm-4 text-right">
           <a class="navbar-brand" href="#">
           <img src="images/logo.png" alt="logo" style="width: 30%">
         </a>
       </div>
       
          <ul class="navbar-nav menu">
               <li class="nav-item">
                  <a class="nav-link" href="#">Welcome </a>
               </li>
           </ul>
        </div>
      </nav>

      	<div class="main">
        <div class="row jumbotron">
        <div class="col-12 col-md-4 text text-center container">
          
        <?php 
        echo "<h1>Witaj,</h1> "."<h1>" . $_SESSION['login']."</h1>"."<br><h1> Zostałeś zalogowany <br> <a href='logout.php'>Wyloguj się</a></h1>";
        ?>
		
          

          <br>
          <br>
		  
		  <a href="zmienemail.php"><input type="button" class="name" value="Zmień adres e-mail"/></a>
		  
		  <br>
		  
		  <a href="zmienhaslo.php"><input type="button" class="name" value="Zmień hasło"/></a>
		  
		  <br>
		  <br>
		  
		  <a href="#"><input type="button" class="name" value="Dodaj nowe ogłoszenie"/></a>
		  <a href="#"><input type="button" class="name" value="Wyświetl swoje ogłoszenia"/></a></div></div>

      <br>
      <br>

      
      <div class="row jumbotron">
      <div class="col-12 col-md-4 text text-center container">

        <form action="posts/add_posts.php" method="POST" enctype="multipart/form-data">
        <h1>Dodaj swoje ogłoszenie</h1> 
        <br/>
        <label for="survey">Opis usługi:</label>
        </br>
        <textarea class="name" name="survey" cols="70%" rows="3" id="survey"></textarea>
        </br></br>
        Typ usługi:</br> &nbsp; <select class="name" name="type">
        <option value="Murarz">Murarz</option>
        <option value="Tynkarz">Tynkarz</option>
        <option value="Płytkarz">Płytkarz</option>
        <option value="cieśla">Cieśla</option>
        <option value="akrobata">akrobata</option>
        </select>
        </br>
        </br>
        Zdjęcie: </br> &nbsp; <input type="file" class="name" name="photo">
        </br></br>
        <input type="submit" class="name" name="send" value="Wyślij" >
      </div>
    </div>
        </form>


        <?php
        if(isset($_SESSION['win']))
        {
          echo '<div class="row jumbotron"><div class="col-12 col-md-4 text text-center container">'.$_SESSION['win'].'</div>'.'</div>';
            unset($_SESSION['win']);

        }
        if(isset($_SESSION['lose']))
        {
          echo '<div class="row jumbotron"><div class="col-12 col-md-4 text text-center container">'.$_SESSION['lose'].'</div>'.'</div>';
            unset($_SESSION['lose']);
        }
        ?>
        <div class="row jumbotron">
      <div class="col-12 col-md-4 text text-center container">
        <h1>Twoje ogłoszenia:</h1>
      </div>
    </div>
    <div class="row jumbotron"><div class="col-12 col-md-4 text text-center container">    

        <?php
        require_once('like/like.php');
        foreach($view as $post): ?>

        
        
        <br>Właściciel:&nbsp;<?php echo $post['owner'] ?>
        <br>Data dodania:&nbsp;<?php echo $post['data'] ?>
        <br>Rodzaj działalności:&nbsp;<?php echo $post['type']?>
        <br>Opis:&nbsp;<?php echo $post['survey']?>
        <br><img src='<?php echo $post['photo']?>'>
        <br><i class="fa fa-thumbs-up like-btn" data-id="<?php echo $post['id']?>"></i>&nbsp;<i class ="fa fa-thumbs-down like-btn" data-id="<?php echo $post['id']?>"></i>
        <br>

         <?php endforeach; ?>


        
        <!-- JQUERY SCRIPT -->
        <script src="script.js"></script>


      </div>
      </div>
    </div>
</body>
</html>
