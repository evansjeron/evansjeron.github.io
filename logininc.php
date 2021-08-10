<?php

if (isset($_POST['submit']))
{
	require 'database.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($username) || empty($password)){
		header ("Location: login.php?error=emptyfields,please-fill-in-all-the-fields");
	}
	else {
		$sql = "SELECT * FROM user WHERE username = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header ("Location: login.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result))
			{
				$passCheck = password_verify($pass, $row['password']);
				if ($passCheck == false){
					header("Location: login.php?error=wrong-passer");
					exit();
				}
				elseif ($passCheck == true){
					session_start();
					$_SESSION['sessionId']=$row['id'];
					$_SESSION['sessionUser']=$row['username'];
					header("Location: portal.php?success=loggedin");
					exit();
				}else {
					header("Location: login.php?error=wrong-pass");
					exit();
					}
				} else {
					header("Location: login.php?error=nouser");
					exit();
				}
			}
}
}
?>