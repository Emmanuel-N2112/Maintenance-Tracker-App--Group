<?php

session_start(); 		// Starting Session
	$_SESSION['message'] = ''; 		// Variable To Store Error Message
	$error = 0;

	if (isset($_POST['submit-signup'])) {

		if (empty($_POST['username']) || empty($_POST['userpassword']) || empty($_POST['email']) || empty($_POST['userlocation'])) {

			$_SESSION['message'] = 'Fill all fields!';
			$error = 1;

		} else {
			$username = $_POST['username'];
			$password = $_POST['userpassword'];
			$password2 = $_POST['confirmpassword'];
			$email = $_POST['email'];
			$location = $_POST['userlocation'];

			if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
				$_SESSION['message'] = 'Only letters allowed';
				$error = 1;
			}
			if ($password != $password2) {
				$_SESSION['message'] = 'Passwords do not match!';
				$error = 1;
			}

			if (strlen($password) < 6) {
				$_SESSION['message'] = 'Password must be at least 6 characters';
				$error = 1;
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['message'] = 'Email is invalid';
				$error = 1;
			}
	
			// Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
			$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");
				
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($connection, $username);
			$email = mysqli_real_escape_string($connection, $email);
			$password = md5($password);
			$location = mysqli_real_escape_string($connection, $location);
					
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($connection, "SELECT * FROM users where UserPassword = '$password' AND UserName = '$username'");

			$rows = mysqli_num_rows($query);
				if ($rows == 1) {
					// Initializing Session
					$_SESSION['message'] = "That username already exists";
					$error = 1;
					
					// Redirecting To Other Page
				} else {

					if($error!=1) {
						//insert new user login information
						$result = mysqli_query($connection, "INSERT INTO users (UserName, UserPassword, UserEmail, UserLocation) VALUES ('$username', '$password', '$email', '$location')");

						if ($result) {
							$_SESSION['login_user'] = $username;
							$_SESSION['message'] = "Registration succeeded";
						} else {
							echo "Failure";
						}
					}
				}			
		mysqli_close($connection); // Closing Connection
		}
	}

	if (isset($_POST['submit-login'])) {

		if (empty($_POST['userpassword']) || empty($_POST['email_name'])) {

			$_SESSION['message'] = 'Fill all fields!';
			$error = 1;

		} else {
			$password = $_POST['userpassword'];
			$email = $_POST['email_name'];

			if (strlen($password) < 6) {
				$_SESSION['message'] = 'Password must be at least 6 characters';
				$error = 1;
			}

			if (!$error == 1) {
				// Establishing Connection with Server by passing server_name, user_id and password as a parameter
				$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");
					
				// To protect MySQL injection for Security purpose
				$password = stripslashes($password);
				$email = mysqli_real_escape_string($connection, $email);
				$password = md5($password);
						
				// SQL query to fetch information of registerd users and finds user match.
				$query = mysqli_query($connection, "SELECT * FROM users where UserPassword = '$password' AND UserEmail = '$email'");
				$query2 = mysqli_query($connection, "SELECT * FROM users where UserPassword = '$password' AND UserName = '$email'");

				$rows = mysqli_num_rows($query);
				$rows2 = mysqli_num_rows($query2);

				if ($rows == 1) {						
					$_SESSION['login_user']=$email; // Initializing Session
					header("location: view/userview.php"); // Redirecting To Other Page

				} elseif($rows2 == 1) {
					$_SESSION['login_user']=$email; // Initializing Session
					header("location: view/userview.php"); // Redirecting To Other Page
				} else {
					$_SESSION['message'] = "User does not exist";
				}
				mysqli_close($connection); // Closing Connection
			}			
		}
	} 
		
	/*
	*	ADMINISTRATOR CONTENT
	*/

	if (isset($_POST['admin-login'])) {

		if (empty($_POST['adminpassword']) || empty($_POST['admin-name'])) {

			$_SESSION['message'] = 'Fill all fields!';

		} else {
			$adPassword = $_POST['adminpassword'];
			$adEmail = $_POST['admin-name'];
	
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");
					
			// SQL query to fetch information of registerd administrators and finds user match.
			$query = mysqli_query($connection, "SELECT * FROM administrator WHERE AdminPassword = '$adPassword' AND AdminEmail = '$adEmail'");
			$query2 = mysqli_query($connection, "SELECT * FROM administrator WHERE AdminPassword = '$adPassword' AND AdminUsername = '$adEmail'");

			$rows = mysqli_num_rows($query);
			$rows2 = mysqli_num_rows($query2);

			if ($rows == 1) {						
				$_SESSION['login-admin']=$adEmail; // Initializing Session
				header("location: view/adminview.php"); // Redirecting To Other Page

			} elseif($rows2 == 1) {
				$_SESSION['login-admin']=$adEmail; // Initializing Session
				header("location: view/adminview.php"); // Redirecting To Other Page
			} else {
				$_SESSION['message'] = "Username or Password is invalid";
				}
			}			
			mysqli_close($connection); // Closing Connection
		}  
?>