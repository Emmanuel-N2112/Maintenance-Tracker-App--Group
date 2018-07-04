<?php
	// Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
	$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

	session_start();// Starting Session

	// Storing Session
	$admin_check = $_SESSION['login-admin'];

	// SQL Query To Fetch Complete Information Of Administrator 1
	$admin_sql=mysqli_query($connection, "SELECT AdminUsername from administrator where AdminEmail = '$admin_check' OR AdminUsername = '$admin_check'");
	$adminId_sql=mysqli_query($connection, "SELECT AdminId from administrator where AdminEmail = '$admin_check' OR AdminUsername = '$admin_check'");

	// SQL Query To Fetch Complete Information Of Administrator 2
	$row2 = mysqli_fetch_assoc($admin_sql);
	$login_session2 = $row2['AdminUsername'];

	$row2 = mysqli_fetch_assoc($adminId_sql);
	$login_id2 = $row2['AdminId'];

	if(!isset($login_session2)){
		mysqli_close($connection); // Closing Connection
		echo "admin";
		//header('Location: ../index.php'); // Redirecting To Home Page
	}

?>