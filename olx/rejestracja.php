<?php
session_start();



	if(isset($_POST['email-r']))
	{

		$flaga=true;
		$loginr=$_POST['login-r'];

	if((strlen($loginr)<3) || (strlen($loginr)>20))
	{
		$flaga=false;
		$_SESSION['error-log']="Twój login musi posiadać od 3 do 20 znaków";
		header('location:index.php');
	}
	if(ctype_alnum($loginr)==false)
	{
		$flaga=false;
		$_SESSION['error-log']="Login nie może składać się z polskich znaków";
		header('location:index.php');
		
	}

		$emailr = $_POST['email-r'];
		$email_san = filter_var($emailr,FILTER_SANITIZE_EMAIL);

	if((filter_var($email_san, FILTER_VALIDATE_EMAIL)==false) || ($email_san!=$emailr))
	{
		$flaga=false;
		$_SESSION['error-email']="Podaj poprawny adres email";
	}

		$haslo1=$_POST['haslo-r'];
		$haslo2=$_POST['haslo-r2'];

	if((strlen($haslo1)<8) || (strlen($haslo1)>20))
	{
		$flaga=false;
		$_SESSION['error-haslo']="Haslo musi posiadać od 8 do 20 znaków";
		header('location:index.php');
	}
	if($haslo1!=$haslo2)
	{
		$flaga=false;
		$_SESSION['error-haslo']="Haslo rózni się od pierwotnego!";
		header('location:index.php');
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
				$_SESSION['error-email']="Istnieje juz konto przypisane do takiego konta email";
				header('location:index.php');
			}

			$rezultat = $polaczenie->query("SELECT id FROM users WHERE login = '$loginr'");

			if(!$rezultat) throw new expection($polaczenie->error);
			$ile_login = $rezultat->num_rows;
			if($ile_login>0)
			{
				$flaga=false;
				$_SESSION['error-log']="Istnieje juz konto z takim loginem";
				header('location:index.php');
			}
			if($flaga==true)
			{
				if($polaczenie->query("INSERT INTO users(`id`, `login`, `haslo`, `email`,`admin`) VALUES ('', '$loginr', '$haslo1', '$emailr', '$haslo2' )"))
				{
				$_SESSION['pass']="Udało ci się zarejestrować. Może się teraz zalogować!";
				header('location:index.php');
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