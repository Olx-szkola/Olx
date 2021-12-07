<?php


   $host = "localhost";
   $db_user = "root";
   $db_password = "";
   $db_name = "olx";


   	$conn =mysqli_connect($host, $db_user, $db_password, $db_name);
	//$select = @mysql_select_db ($db_name, $conn);

if ($conn->connect_errno!=0) {
    die ('<p class="error">Nie udało się połączyć z bazą danych.</p>');
}




?>