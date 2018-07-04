<?php 
function do_html_header($title) {

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Maintenance Tracker App">
    <meta name="keywords" content="maintenance, app, tracker">
    <meta name="author" content="Emmanuel Okot">
	<title><?php echo $title; ?></title>

<?php
}

?>

<?php

function display_sign_up_form() {
    include('includes/form_process.php');

?>
	<div class="nested">
		<div class="form1">
			<h3>Account Sign Up</h3>
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="error-message"><?php echo "<p>".$_SESSION['message']."</p>"; ?></div>
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter name"><br>
            <label>Password</label>
            <input type="password" name="userpassword" placeholder="Enter any password"><br>
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" placeholder="Enter any password"><br>
            <label>Email</label>
            <input type="text" name="email" placeholder="Enter email address"><br>
            <label>Location</label>
            <input type="text" name="userlocation" placeholder="Enter City">
            <label>I am </label>
            <input type="radio" class="radiobox" name="gender-m">Male 
            <input type="radio" class="radiobox" name="gender-f">Female<br>
            <input type="checkbox" class="checkbox" name="checkbox">Keep me signed in?
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            <input type="submit" name="submit-signup" class="submit" value="Sign In">
            <p>Already have an Account?<a href="login.php" style="color: blue"> Login</a></p>
            </form>
		</div>
		
        <div class="body-content">
            <h2>Maintenance Tracker App</h2>
            <p class="content text-justify">Hey there! Get the best known services everyday by joining Maintenance Tracker App</p>
			<p class="content text-justify">Maintenance Tracker App is an application that provides users with the ability to reach out to operations or repairs department regarding repair or maintenance requests and monitor the status of their requests</p>
		</div>
    </div>

<?php
}

?>

<?php

function display_log_in_form() {
    include('includes/form_process.php');

?>
    <div class="nested">
        <div class="form1">
            <h3>Account Login</h3>
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="error-message" "><?php echo "<p>".$_SESSION['message']."</p>"; ?></div>
            <label>Username or Email</label>
            <input type="text" name="email_name" placeholder="Enter email username or address"><br>
            <label>Password</label>
            <input type="password" name="userpassword" placeholder="Enter any password"><br>
            <input type="checkbox" class="checkbox" name="checkbox">Keep me signed in?
            <input type="submit" name="submit-login" class="submit" value="Log In">
            <p>Do not have an Account?<a href="index.php" style="color: blue"> Sign Up</a></p>
            </form>
        </div>
        
        <div class="body-content">
            <h2>Maintenance Tracker App</h2>
            <p class="content text-justify">Hey there! Get the best known services everyday by joining Maintenance Tracker App</p>
            <p class="content text-justify">Maintenance Tracker App is an application that provides users with the ability to reach out to operations or repairs department regarding repair or maintenance requests and monitor the status of their requests</p>
        </div>
    </div>

<?php
}

?>

<!-- ADMINISTRATOR CONTENT -->

<?php

function display_admin_log_in_form() {
    include('includes/form_process.php');

?>
    <div class="nested">
        <div class="form1">
            <h3>Admin Login</h3>
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="error-message" "><?php echo "<p>".$_SESSION['message']."</p>"; ?></div>
            <label>Username or Email</label>
            <input type="text" name="admin-name" placeholder="Enter username or email address"><br>
            <label>Password</label>
            <input type="password" name="adminpassword" placeholder="Enter any password"><br>
            <input type="checkbox" class="checkbox" name="checkbox">Keep me signed in?
            <input type="submit" name="admin-login" class="submit" value="Log In">
            <p><a href="login.php" style="color: blue">Login</a> as a User</p>
            </form>
        </div>
        
        <div class="body-content">
            <h2>Maintenance Tracker App</h2>
            <p class="content text-justify">Hey there! Get the best known services everyday by joining Maintenance Tracker App</p>
            <p class="content text-justify">Maintenance Tracker App is an application that provides users with the ability to reach out to operations or repairs department regarding repair or maintenance requests and monitor the status of their requests</p>
        </div>
    </div>

<?php
}

?>