<?php include('server.php') ?>


<html>
    <head>
        <title> MAINTANANCE TRACKER APPLICATION </title>
        <meta charset = "UTF-8"/>
        <meta name="description" content="This is a new type of system, never seen before">
         <link rel="stylesheet" type="text/css" href="css.css" />
		 <script>
           img.medium {
               width: 250px;
               height: 250px;
           }
           img.align-center {
               display: block;
               margin: 0px auto;
           }
           body{
            background-image: url('images/6.jpeg');   
               background-repeat: no-repeat;
			  
           }
        </script>
    <body style="margin:0px !important;">

			<div class="main" style="">
			<div class="nav">
				<p style="color:white;margin-left:10%;font-size:20px;">MAINTANANCE TRACKER APPLICATION</p>
			</div>
			<div class="login">
                <form method="post" action="User_page.php">
			<input style="float:left;margin-left:10px;" type="text" name="username" placeholder="User Name">
			<input style="float:left;margin-left:10px;" type="password" name="password" placeholder="Password">
			<input style="float:left" type="submit" value="login" name="login_user">
                </form>
			</div>
			<div class="body">
				
				<h1 style="text-align:center;color:white;">Register</h1>
				
					<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label style="color: white;">Username</label>
			<input type="text" name="username" style="margin-left:69px;" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label style="color: white;">Email</label>
			<input type="email" name="email" style="margin-left:96px;" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label style="color: white;">Password</label>
			<input type="password" style="margin-left:73px;" name="password_1">
		</div>
		<div class="input-group">
			<label style="color: white;">Confirm password</label>
			<input type="password" style="margin-left:15px;" name="password_2"> 
		</div>
					
				<button style="margin-left:25%;width:40%; height:30px;" class="btn" type="submit" name="reg_user"> <h3 style="margin-top:0px;">Register </h3> </button> 

				</form>
			
			</div>
			<div class="footer"></div>
			</div>
         
    </body>
</html>