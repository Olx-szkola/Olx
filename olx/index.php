<?php
session_start();
if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('location: ogloszenia.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('html_includes/header.php'); ?>
  </head>
  <body>

      	<div class="main-true">
        
        
        
        <div class="fluid_container">
        <div id="block2" class="">

          <div class="main_container">
          <div class="login_container">
          
          <img src="uploads/TYP.IE.PNG" class="logo">
          <button id="btn1" name="btn1" onclick="przejdz();" class="b1 btn btn1 active_tab">Logowanie</button>
          <button name="btn2" id="btn2" onclick="przejdz1();" class="b2 btn btn2">Nowe konto</button>
          <div class="form-group">
          <form action="zaloguj.php" method="post">
          
          
          </div>

          <div class="space">
          <input type="text" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Wpisz login" name="login" id="sprawdzmail">
          </div>
          <div class="space">
          <input type="password" class="form-control" id="haslo" placeholder="Hasło" name="haslo">
          </div>

      	 <input class="btn btn-primary btn_width" type="submit" id="submit" name="name" value="Zaloguj się">
         
        </form>

        <script type="text/javascript">

        function przejdz(){
        var element1 = document.getElementById("blok1");
        var element2 = document.getElementById("block2");
        var element3 = document.getElementsByClassName("b2")[0];
        var element4 = document.getElementsByClassName("b1")[0];
        if(document.getElementById("btn2").value == 0)
        {
          element1.classList.add("active");
          element2.classList.remove("active");
          element3.classList.remove("active_tab");
          element4.classList.add("active_tab");

        }
      }
        function przejdz1(){
        var element1 = document.getElementById("blok1");
        var element2 = document.getElementById("block2");
        var element3 = document.getElementsByClassName("b3")[0];
        var element4 = document.getElementsByClassName("b4")[0];
        if(document.getElementById("btn1").value == 0)
        {
          element2.classList.add("active");
          element1.classList.remove("active");
          element3.classList.remove("active_tab");
          element4.classList.add("active_tab");
        }
      
        }
        </script>
        </div>
        </div>
        <?php
          if(isset($_SESSION['blad']))
          {
            echo $_SESSION['blad'];
          }
          unset($_SESSION['blad']);
          ?>
          <div id="ee"></div>
    </div>


    



        
        <div class="fluid_container">
        <div id="blok1" class="active">

        <div class="main_container">

        <div class="form-group">
        
        <div class="register_container">
        <button id="btn1" name="btn1" onclick="przejdz()" class="b3 btn btn1">Logowanie</button>
        <button name="btn2" id="btn2" onclick="przejdz1()" class="b4 btn btn2">Nowe konto</button>
        <form action="rejestracja.php"  method="post">    
        <div class="space">    				
       	<input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Wpisz login" name="login-r" id="sprawdzmail">
        
        </div>
     <?php

     if(isset($_SESSION['error-log']))
     {
     	echo '<div id="error" class="alert alert-danger" role="alert">'.$_SESSION['error-log'].'</div>';
       	unset($_SESSION['error-log']);
     }
     ?>
     
      
      <div class="space">
     	<input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Wpisz hasło" name="haslo-r" id="sprawdzmail">
     	</div>
      <?php

     	if(isset($_SESSION['error-haslo']))
       	{
       	echo '<div class="error">'.$_SESSION['error-haslo'].'</div>';
       	unset($_SESSION['error-haslo']);
       	}

     	?>
      <div class="space">
     	<input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Powtórz hasło" name="haslo-r2" id="sprawdzmail">
      </div>
      <div class="space">
      <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Wpisz email" name="email-r" id="sprawdzmail">
      </div>     
     <?php

     if(isset($_SESSION['error-email']))
       {
       	echo '<div class="error">'.$_SESSION['error-email'].'</div>';
       	unset($_SESSION['error-email']);
       	}

     ?>
       <br>
      	<div class="space">
      	<input class="btn btn-primary btn_width" type="submit" class="name" value="Przejdz dalej">
      	 </div>
         <?php

	     if(isset($_SESSION['pass']))
	       {
	       	echo '<div class="error">'.$_SESSION['pass'].'</div>';
	       	unset($_SESSION['pass']);
	       	}

     	?>	
          </form>
        </div>
          
          
          </div>
        </div>
          
          <br>
          <br>
</body>
</html>
