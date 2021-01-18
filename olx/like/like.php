<?php
		
		require_once('connect.php');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $owner = $_SESSION['login'];

        $view=$conn->query("SELECT * FROM POSTS WHERE OWNER = '$owner'");
        $user_id=$conn->query("SELECT id FROM users WHERE login = '$owner'");
        
 		
 		if(isset($_POST['action'])) {
 			$post_id = $_POST['post_id'];
 			$action = $_POST['action'];

 			

 			switch ($action) {
 				case 'like':
 					$sql = $conn->query("INSERT INTO rating_info (`post_id`,  `user_id`, `rating_action`) VALUES ('$post_id', '$user_id', '$action')
 					ON DUPLICATE KEY UPDATE rating_action='like'");
 					break;
 				
 				case 'dislike':
 					$sql = "INSERT INTO rating_info (`post_id`,  `user_id`, `rating_action`) VALUES ('$post_id', '$user_id', '$action')
 					ON DUPLICATE KEY UPDATE rating_action='dislike'";
 					break;
 				case 'unlike':
 						$sql = "DELETE FROM rating_info WHERE user_id='$user_id' AND post_id = '$post_id'";
 					
 				break;
 				case 'undislike':
 					$sql = "DELETE FROM rating_info WHERE user_id='$user_id' AND post_id = '$post_id'";
 					break;

 			}
 			
 			exit(0);
 		}

 		return 0;


















?>