<?php
session_start();

	if(isset($_POST['haslo-z']))
	{
	$flaga=true;
	$hasloz1=$_POST['haslo-z'];
	$hasloz2=$_POST['haslo-z2'];
	$id=$_SESSION['id'];
	
	
	if((strlen($hasloz1)<8) || (strlen($hasloz1)>20))
	{
		$flaga=false;
		$_SESSION['error-haslo']="<div id='error' class='alert alert-danger' role='alert'>Haslo musi posiadać od 8 do 20 znaków</div>";
		header('location:zmien_dane.php');
	}
	
	
	if($hasloz1!=$hasloz2)
	{
		$flaga=false;
		$_SESSION['error-haslo']="<div id='error' class='alert alert-danger' role='alert'>Haslo rózni się od pierwotnego!</div>";
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
				if($polaczenie->query("UPDATE users SET `haslo`='$hasloz1' WHERE `id`='$id'"))
				{
				$_SESSION['pass']="<div class='alert alert-success' role='alert'>Udało ci się zmienić hasło!</div>";
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