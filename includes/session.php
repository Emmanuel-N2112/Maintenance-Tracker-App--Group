<?php
	// Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
	$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");
	
	session_start();// Starting Session

	// Storing Session
	$user_check = $_SESSION['login_user'];

	// SQL Query To Fetch Complete Information Of User 1
	$ses_sql=mysqli_query($connection, "SELECT UserName from users where UserEmail = '$user_check' OR UserName = '$user_check'");
	$sesId_sql=mysqli_query($connection, "SELECT UserId from users where UserEmail = '$user_check' OR UserName = '$user_check'");

	// SQL Query To Fetch Complete Information Of User 2
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['UserName'];

	$row = mysqli_fetch_assoc($sesId_sql);
	$login_id = $row['UserId'];

	if(!isset($login_session)){
		mysqli_close($connection); // Closing Connection
		header('Location: ../index.php'); // Redirecting To Home Page
	}

 ?>

