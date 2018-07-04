<?php

	function navigation1() {

?>
	<div class="container">
		<div class="heading">
			<h1>Maintenance Tracker App</h1> 
		</div>
	
		<div class="menu">
			<ul class="nav">
				<li><a href="#">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="index.html">Sign Up/Sign In</a></li>
                <input type="search" name="search" placeholder="Search">
			</ul>
		</div>
<?php
	}
?>

<?php

	function navigation2() {

?>
	<div class="container">
		<div class="heading">
			<h1>Maintenance Tracker App</h1> 
		</div>

		<div class="menu">
			<ul class="nav">
				<li class="nav"><a href="userview.php" class="active"><span class="icon-home"> </span>Home</a></li>
				<li class="nav"><a href="userDashboard.php"><span class="icon-meter"> </span>Dashboard</a></li>
				<li class="nav"><a href="../adminLogin.php"><span class="icon-user-tie"> </span>Leaderboard</a></li>
                <input type="search" name="search" placeholder="Search site" class="search-spacing1">
                <li class="nav"><a href="../includes/logout.php"><span class="icon-exit"> </span>Logout</a></li>
			</ul>
		</div>
<?php
	}
?>

<?php

	function navigation3() {

?>
	<div class="container">
		<div class="heading">
			<h1>Maintenance Tracker App</h1> 
		</div>

		<div class="menu">
			<ul class="nav">
				<li class="nav"><a href=" "><span class="icon-home"> </span>Home</a></li>
				<li class="nav"><a href="userDashboard.php" class="active"><span class="icon-meter"> </span>Dashboard</a></li>
				<li class="nav"><a href="../adminLogin.php"><span class="icon-user-tie"> </span>Leaderboard</a></li>
                <input type="search" name="search" placeholder="Search site" class="search-spacing1">
                <li class="nav"><a href="../includes/logout.php"><span class="icon-exit"> </span>Logout</a></li>
			</ul>
		</div>
<?php
	}
?>

<?php

	function userSideBar($login_session) {

?>
        <div class="nested">
			<div class="v-menu">
                <ul>
                    <div class="profile">
                        <button class="dropdown-btn">
                            <img alt="profile picture" src="../assets/images/male-avatar.png"> <?php echo $login_session; ?></button>
                        <div class="dropdown-container">
                            <a href="">Preferences</a>
                            <a href="userProfile.php">Profile</a>
                        </div>
                    </div>
                    <h3>Maintenance Menu</h3>
                    <li><a href="requestOrder.php">Request Order Details</a></li>
                    <li><a href="userRequests.php">Submitted Requests</a></li>
                    <li><a href="userassets.php">My Devices</a></li>
                    <div class="search-spacing2">
                    <label>Find Device</label>
                        <input type="search" name="search" placeholder=" ">
                    <a class="submit">Go</a></div>
                </ul>
			</div>
<?php
	}
?>

<?php

	function admin_navigation1() {

?>
	<div class="container">
		<div class="heading">
			<h1>Maintenance Tracker App</h1> 
		</div>

		<div class="menu">
			<ul class="nav">
				<li class="nav"><a href="adminview.php" class="active"><span class="icon-home"> </span>Home</a></li>
				<li class="nav"><a href="adminDashboard.php"><span class="icon-meter"> </span>Dashboard</a></li>
                <input type="search" name="search" placeholder="Search site" class="search-spacing1">
                <li class="nav"><a href="../includes/logout.php"><span class="icon-exit"> </span>Logout</a></li>
			</ul>
		</div>
<?php
	}
?>

<?php

	function admin_navigation2() {

?>
	<div class="container">
		<div class="heading">
			<h1>Maintenance Tracker App</h1> 
		</div>

		<div class="menu">
			<ul class="nav">
				<li class="nav"><a href="adminview.php"><span class="icon-home"> </span>Home</a></li>
				<li class="nav"><a href="adminDashboard.php" class="active"><span class="icon-meter"> </span>Dashboard</a></li>
                <input type="search" name="search" placeholder="Search site" class="search-spacing1">
                <li class="nav"><a href="../includes/logout.php"><span class="icon-exit"> </span>Logout</a></li>
			</ul>
		</div>
<?php
	}
?>


<?php

	function adminSideBar($login_session) {

?>
        <div class="nested">
			<div class="v-menu">
                <ul>
                    <div class="profile">
                        <button class="dropdown-btn">
                            <img alt="profile picture" src="../assets/images/male-avatar.png"> <?php echo $login_session; ?></button>
                        <div class="dropdown-container">
                            <a href="">Preferences</a>
                            <a href="adminprofile.php">Profile</a>
                        </div>
                    </div>
                    <h3>Maintenance Menu</h3>
                    <li><a href="adminRequestsDetails.php">Request Order Details</a></li>
                    <li><a href="adminRequests.php">Submitted Requests</a></li>
                    <li><a href="">People & Teams</a></li>
                    <li><a href="devices.php">Devices</a></li>
                    <div class="search-spacing2">
                    <label>Find Device</label>
                        <input type="search" name="search" placeholder=" ">
                    <a class="submit">Go</a></div>
                </ul>
			</div>
<?php
	}
?>
