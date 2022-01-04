<?php
  session_start();
  if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) 
  {
  	header('Location: log_rej.php');
  	exit();
  }
  require_once "connect.php";

  			

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
  if($polaczenie->connect_errno!=0)
  {
  	echo "ERROR:".$polaczenie->connect_errno;
  }
  else
  {
  	$login = $_POST['login'];
  	$haslo = $_POST['haslo'];

  	$sql = "SELECT * FROM users WHERE login = '$login' AND haslo = '$haslo'";
  
  	if($rezultat = @$polaczenie->query($sql))
  	{
  		$ilu = $rezultat->num_rows;
  		if($ilu>0)
  		{
  			$_SESSION['zalogowany']=true;

  			$wiersz = $rezultat->fetch_assoc();
  			$_SESSION['id'] = $wiersz['id'];
  			$_SESSION['login'] = $wiersz['login'];
        $_SESSION['admin'] = $wiersz['admin'];

  			unset($_SESSION['blad']);

        if ($_SESSION['admin']==1) {
          
          header('location: storage.php');
          
        }
        else{
         
  			header('location: ogloszenia.php');

        }

  		}
  		else
  		{
  			$_SESSION['blad'] = "<div class='alert alert-danger error' role='alert'>
         Błąd niepoprawny login lub hasło!</div>";
  			header('location:log_rej.php');

  		}

  	}

  	$polaczenie->close();
  }


  ?>

