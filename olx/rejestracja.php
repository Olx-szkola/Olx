<?php
session_start();

	if(isset($_POST['email-r']))
	{
		$flaga=true;
		$loginr=$_POST['login-r'];

	if((strlen($loginr)<3) || (strlen($loginr)>20))
	{
		$flaga=false;
		$_SESSION['error-log']="Twój nick musi posiadać od 3 do 20 znaków";
		header('location:index.php');
	}
	if(ctype_alnum($loginr)==false)
	{
		$flaga=false;
		$_SESSION['error-log']="Login nie może składać się z polskich znaków";
		header('location:index.php');
		
	}
	if($flaga==true)
	{
		echo"udało sie"; 
		exit();
	}
}
?>