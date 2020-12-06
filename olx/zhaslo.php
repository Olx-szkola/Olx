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
		$_SESSION['error-haslo']="Haslo musi posiadać od 8 do 20 znaków";
		header('location:zmienhaslo.php');
	}
	
	
	if($hasloz1!=$hasloz2)
	{
		$flaga=false;
		$_SESSION['error-haslo']="Haslo rózni się od pierwotnego!";
		header('location:zmienhaslo.php');
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
				$_SESSION['pass']="Udało ci się zmienić hasło!";
				header('location:zmienhaslo.php');
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