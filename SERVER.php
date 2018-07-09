<? php
session_start();

// initializing variables
$firstName= "";
$lastName= "";
$email = "" ;
$password = "";
$errors = array(); 
$_SESSION['success'] = "";



	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$firstName = mysqli_real_escape_string($db, $_POST['firstName']);
		$lastName = mysqli_real_escape_string($db, $_POST['lastName']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		// form validation: ensure that the form is correctly filled
		if (empty($firstName)) { array_push($errors, "First Name is required"); }
		if (empty($lastName)) { array_push($errors, "Last Name is required"); }
		if (empty($email)) { array_push($errors, "E-mail is required"); }
        if (empty($password)) { array_push($errors, "Password is required"); }


		// register user if there are no errors in the form
		if (count($errors) == 0) {
            // connect to the database
                $db = mysqli_connect('localhost', 'root', '', 'buhwa');

                if ($db) {
                    echo "database connected";
                }
            
			$password = md5($password);//encrypt the password before saving in the database
			$query = "INSERT INTO users (firstName, lastName, email, password) 
					  VALUES('$firstName', '$lastName', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in";
			header('location: userpage.php');
		} else {
            header("location: index.php");
        }

	}


/** REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
   $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstName)) { array_push($errors, "firstName is required"); 
    }else {
    $firstName = test_input($_POST["firstName"]);}
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
      $firstNameErr = "Only letters and white space allowed";}

  if (empty($lastName)) { array_push($errors, "lastName is required"); 
      }else {
    $lastName = test_input($_POST["lastName"]);}
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
      $nameErr = "Only letters and white space allowed";}
  if (empty($email)) { array_push($errors, "Email is required"); 
    }else {
    $email = test_input($_POST["email"]);}
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; }

  if (empty($password)) { array_push($errors, "Password is required"); }
 

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (firstName, lastName, email, password) 
  			  VALUES('$firstName', '$lastName', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['firstName'] = $firstName;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: userpage.php');
  }
**/
    

// LOGIN USER
  if (isset($_POST['login_user']))
{
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "E-mail is required");
  }
  if (empty($password)) {
    array_push($errors, "password is required");
  }

  if (count($errors) == 0)
  {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
?>