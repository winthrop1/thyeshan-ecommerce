<?php 
require_once('../config/mitigations.php');
$login = isset($_POST['login'])?$_POST['login']:"";

if ($login!="")
{
	$uemail = htmlentities($_POST['uemail']);
	$pword = htmlentities($_POST['pword']);
	
	require("../config/sql_connection.php");

	// Check if we're using mock database or real database
	if ($conn && !isset($GLOBALS['use_mock_db'])) {
		// Real database
		$sql = 'SELECT id, email, memname, password FROM members WHERE email = ? ';
		$search_result = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($search_result,'s', $uemail);
		mysqli_stmt_execute($search_result);
		mysqli_stmt_bind_result($search_result, $id, $em, $mn, $pw);
		mysqli_stmt_fetch($search_result);
		
		if (password_verify($pword, $pw)) {
			session_start();
			$_SESSION['MM_name'] = $mn;
			$_SESSION['MM_Uid'] = $id;
			header("Location:../index.php");
			exit();
		} else {
			header("Location:login.php?stt=1");
			exit();
		}
	} else {
		// Mock database - simple authentication
		$user_found = false;
		if (isset($GLOBALS['mock_members'])) {
			foreach ($GLOBALS['mock_members'] as $member) {
				if ($member['email'] === $uemail && $member['password'] === $pword) {
					$user_found = true;
					session_start();
					$_SESSION['MM_name'] = $member['memname'];
					$_SESSION['MM_Uid'] = $member['id'];
					header("Location:../index.php");
					exit();
				}
			}
		}
		
		if (!$user_found) {
			header("Location:login.php?stt=1");
			exit();
		}
	}
}
// Return the number of rows in search result
// $userfound = mysqli_num_rows($search_result);

// }

// if($userfound >= 1)    
// 	{
// 		// User record is found in the userinfo table
// 		session_start();
// 		$sql_name = mysqli_fetch_assoc($search_result);
// 		$_SESSION['MM_name'] = $sql_name['memname'];
// 		$_SESSION['MM_Uid']= $sql_name['id'];
// 		header("Location:index.php");  
// 	}
// 	else     
// 	{
// 		// User record is NOT found in the userinfo table
// 		header("Location:login.php?stt=1");  	// go back to login page
// 	}
	
	
?>
