<?php
session_start();

	if(isset($_POST['email-z']))
	{
	$flaga=true;
	$emailz1=$_POST['email-z'];
	$emailz2=$_POST['email-z2'];
	$id=$_SESSION['id'];

	
	
	if($emailz1!=$emailz2)
	{
		$flaga=false;
		$_SESSION['error-email']="<div id='error' class='alert alert-danger' role='alert'>Email rózni się od pierwotnego!</div>";
		header('location:zmien_dane.php');
	}
	
	$email_san = filter_var($emailz1,FILTER_SANITIZE_EMAIL);

	if((filter_var($email_san, FILTER_VALIDATE_EMAIL)==false) || ($email_san!=$emailz1))
	{
		$flaga=false;
		$_SESSION['error-email']="<div id='error' class='alert alert-danger' role='alert'>Podaj poprawny adres email</div>";
		header('location:zmien_dane.php');
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
		if($flaga==true)
			{
				if($polaczenie->query("UPDATE users SET `email`='$emailz1' WHERE `id`='$id'"))
				{
				$_SESSION['pass']="<div class='alert alert-success' role='alert'>Udało ci się zmienić e-mail!</div>";
				header('location:zmien_dane.php');
				}
				else
				{
					throw new Exception($polaczenie->error);
				}

			}
		}	
		$polaczenie->close();
	}
	catch(Exception $e)
	{
		echo "Błąd połączenia";
		echo $e;
	}
	}
	
?>