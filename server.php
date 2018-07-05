<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
    $password = "";
    $id_no    = "";
    $type     = "";
    $description = "";
    $remark     = "";
	$errors = array(); 

    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "jerome";
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'jerome');
    if ($db){
        echo "database connected";
    }
    $conn = new PDO("mysql:host=$db_server; dbname=$db_database", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);//encrypt the password before saving in the database
			$query = "INSERT INTO requests2 (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: User_page.php');
		}

	}

if (isset($_POST['create_request'])) {
		// receive all input values from the form
		$id_no = mysqli_real_escape_string($db, $_POST['id_no']);
		$type = mysqli_real_escape_string($db, $_POST['type']);
		$description = mysqli_real_escape_string($db, $_POST['description']);
		$remark = mysqli_real_escape_string($db, $_POST['remark']);

	// form validation: ensure that the form is correctly filled
		if (empty($id_no)) { array_push($errors, "ID No is required"); }
		if (empty($type)) { array_push($errors, "Type is required"); }
		if (empty($description)) { array_push($errors, "Description is required"); }
        if (empty($remark)) { array_push($errors, "Remark is required"); }

		if (count($errors) == 0) {
			$query = "INSERT INTO requests (id_no, type, description, remark) 
					  VALUES('$id_no', '$type', '$description', '$remark')";
			mysqli_query($db, $query);

			$_SESSION['id_no'] = $id_no;
			$_SESSION['success'] = "You have submitted a request";
			header('location: Create_Requests.php');
		}

	}


	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM requests2 WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['success'] = "You are now logged in";
				header('location: User_page.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

// REGISTER USER
	if (isset($_POST['delete_request'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);//encrypt the password before saving in the database
			$query = "INSERT INTO requests2 (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: User_page.php');
		}

	}



?>