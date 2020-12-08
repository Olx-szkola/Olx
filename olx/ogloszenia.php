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
    <title>OLX</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
     integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  </head>
  <body>
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
        <?php
        include('connect.php');
        mysqli_report(MYSQLI_REPORT_STRICT);

        $owner = $_SESSION['login'];

        $view=$conn->query("SELECT * FROM POSTS WHERE OWNER = '$owner'");
        
        while($row = $view->fetch_assoc())

        {
        echo '<div class="row jumbotron"><div class="col-12 col-md-4 text text-center container">';
        echo "<br>"."Właściciel:&nbsp;".$row['owner'];
        echo "<br>"."Data dodania:&nbsp;".$row['data'];
        echo "<br>"."Rodzaj działalności:&nbsp;".$row['type'];
        echo "<br>"."Opis:&nbsp;".$row['survey'];
        echo "<br>"."<img src='".$row['photo']."'";

        }
          ?>

      </div>
      </div>
</body>
</html>
