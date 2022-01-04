<?php
session_start();



	if(isset($_POST['email-r']))
	{

		$flaga=true;
		$loginr=$_POST['login-r'];

	if((strlen($loginr)<3) || (strlen($loginr)>20))
	{
		$flaga=false;
		$_SESSION['error-log']="<div id='error' class='alert alert-danger' role='alert'>Twój login musi posiadać od 3 do 20 znaków</div>";
		header('location:log_rej.php');
	}
	if(ctype_alnum($loginr)==false)
	{
		$flaga=false;
		$_SESSION['error-log']="<div id='error' class='alert alert-danger' role='alert'>Login nie może składać się z polskich znaków</div>";
		header('location:log_rej.php');
		
	}

		$emailr = $_POST['email-r'];
		$email_san = filter_var($emailr,FILTER_SANITIZE_EMAIL);

	if((filter_var($email_san, FILTER_VALIDATE_EMAIL)==false) || ($email_san!=$emailr))
	{
		$flaga=false;
		$_SESSION['error-email']="<div id='error' class='alert alert-danger' role='alert'>Podaj poprawny adres email</div>";
	}

		$haslo1=$_POST['haslo-r'];
		$haslo2=$_POST['haslo-r2'];

	if((strlen($haslo1)<8) || (strlen($haslo1)>20))
	{
		$flaga=false;
		$_SESSION['error-haslo']="<div id='error' class='alert alert-danger' role='alert'>Haslo musi posiadać od 8 do 20 znaków</div>";
		header('location:log_rej.php');
	}
	if($haslo1!=$haslo2)
	{
		$flaga=false;
		$_SESSION['error-haslo']="<div id='error' class='alert alert-danger' role='alert'>Haslo rózni się od pierwotnego!</div>";
		header('location:log_rej.php');
	}

	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);

	try
	{
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		if($polaczenie->connect_errno!=0)
		{
			throw new Exception(mysqli_connect_errno());
		}
		else
		{
			$rezultat = $polaczenie->query("SELECT id FROM users WHERE email = '$emailr'");

			if(!$rezultat) throw new expection($polaczenie->error);
			$ile = $rezultat->num_rows;
			if($ile>0)
			{
				$flaga=false;
				$_SESSION['error-email']="<div id='error' class='alert alert-danger' role='alert'>Istnieje juz konto przypisane do takiego konta email</div>";
				header('location:log_rej.php');
			}

			$rezultat = $polaczenie->query("SELECT id FROM users WHERE login = '$loginr'");

			if(!$rezultat) throw new expection($polaczenie->error);
			$ile_login = $rezultat->num_rows;
			if($ile_login>0)
			{
				$flaga=false;
				$_SESSION['error-log']="<div id='error' class='alert alert-danger' role='alert'>Istnieje juz konto z takim loginem</div>";
				header('location:log_rej.php');
			}
			if($flaga==true)
			{
				if($polaczenie->query("INSERT INTO users(`id`, `login`, `haslo`, `email`,`admin`) VALUES ('', '$loginr', '$haslo1', '$emailr', '0' )"))
				{
				$_SESSION['pass']="<div class='alert alert-success' role='alert'>Udało ci się zarejestrować. Może się teraz zalogować!</div>";
				header('location:log_rej.php');
				}
				else
				{
					throw new Exception($polaczenie->error);
				}

			}
			
			$polaczenie->close();
		}

	}
	catch(Exception $e)
	{
		echo "Błąd połączenia";
		echo $e;
	}


	
}
?>