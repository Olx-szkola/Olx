<?php
		require_once('connect.php');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $view=$conn->query("SELECT * FROM POSTS");

?>