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
  <body>

      	<div class="main-true">
        
        
        
          <div class="fluid_container">
          <div id="block2" class="">

          <div class="main_container">
          <div class="login_container">
          
          <a href="index.php"><img src="uploads/TYP.IE.PNG" class="logo"></a>
          <button id="btn1" name="btn1" onclick="przejdz();" class="b1 btn btn1 active_tab">Zmień hasło</button>
          <button name="btn2" id="btn2" onclick="przejdz1();" class="b2 btn btn2">Zmień e-mail</button>
          <div class="form-group">
          <form action="zhaslo.php" method="post">
          
          
          </div>

          
          <div class="space">
          <input type="password" class="form-control" id="haslo-z" placeholder="Nowe hasło" name="haslo-z">
          </div>
			<?php

			if(isset($_SESSION['error-haslo']))
			{
			echo $_SESSION['error-haslo'];
			unset($_SESSION['error-haslo']);
			}
			?>
			
		  <div class="space">
          <input type="password" class="form-control" id="haslo-z2" placeholder="Powtórz hasło" name="haslo-z2">
          </div>
		  <div class="text-align:center">
		  <?php

			if(isset($_SESSION['pass']))
			{
	       	echo $_SESSION['pass'];
	       	unset($_SESSION['pass']);
	       	}

			?>
			</div>
      	 <input class="btn btn-primary btn_width btn_color" type="submit" id="submit" name="name" value="Zmień hasło">
			
			
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
        <a href="index.php"><img src="uploads/TYP.IE.PNG" class="logo"></a>
        <button id="btn1" name="btn1" onclick="przejdz()" class="b3 btn btn1">Zmień hasło</button>
        <button name="btn2" id="btn2" onclick="przejdz1()" class="b4 btn btn2">Zmień e-mail</button>
        <form action="zemail.php"  method="post"> 
		
           				
       	<div class="space">
          <input type="text" class="form-control" id="email-z" placeholder="Nowy e-mail" name="email-z">
          </div>
			<?php

			if(isset($_SESSION['error-email']))
			{
			echo $_SESSION['error-email'];
			unset($_SESSION['error-email']);
			}

			?>		

<div class="space">
          <input type="text" class="form-control" id="email-z2" placeholder="Powtórz e-mail" name="email-z2">
          </div>
		  <div class="text-align:center">
			<?php

			if(isset($_SESSION['pass']))
			{
	       	echo $_SESSION['pass'];
	       	unset($_SESSION['pass']);
	       	}

			?>
			</div>
      	 <input class="btn btn-primary btn_width btn_color" type="submit" id="submit" name="name" value="Zmień hasło">			
          </form>
        </div>

          
          
          </div>

        </div>
      </div>
    </div>
    <a href="ogloszenia.php" class="btn btn-outline-success btn_back"><i class="fas fa-chevron-right fas_left"></i>&nbsp;Powrót</a>
  </div>




        
          
          <br>
          <br>
</body>
</html>

