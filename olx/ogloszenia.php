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
        echo "Witaj, " . $_SESSION['login']."<br> Zostałeś zalogowany <br> <a href='logout.php'>Wyloguj się</a>";
        ?>
		
          

          <br>
          <br>
		  
		  <a href="zmienemail.php"><input type="button" class="name" value="Zmień adres e-mail"/></a>
		  
		  <br>
		  
		  <a href="zmienhaslo.php"><input type="button" class="name" value="Zmień hasło"/></a>
		  
		  <br>
		  <br>
		  
		  <a href="#"><input type="button" class="name" value="Dodaj nowe ogłoszenie"/></a>
		  <a href="#"><input type="button" class="name" value="Wyświetl swoje ogłoszenia"/></a>
</body>
</html>
