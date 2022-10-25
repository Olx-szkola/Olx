<?php
		
		require_once('connect.php');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $owner = $_SESSION['login'];

        $view=$conn->query("SELECT * FROM storage ORDER BY data DESC");
        
?>