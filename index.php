<?php include('SERVER.php') ?>
<html>
<head>
	<meta charset = "UTF-8">
	<meta name="viewpoint" content="width=device-width">
	<title>AppTheme</title>
	<link rel="stylesheet" href="css/style.css">
			
                
</head>
<body>

       
		<!--HEADER-->
          <header>
               <div class="container">
                    <div id="branding">
				<div class="app-theme">
					<h1><span class="highlight">Maintainance</span>Tracker</h1>
				</div>
				<nav>
					<ul>
						<li class="current"><a href="index.html">Home</a></li>
						<li><a href="services.html">Services</a></li>
						<li><a href="about.html">About</a></li>
					</ul>
				</nav>
	              </div>
              </div>
          </header>
  		
          <section id="showcase">
  			<div class="container">
  				<h2>WELCOME TO MAINTAINANCE TRACKER WEBSITE</h2 >
  				<p>A Simple UI Temlate In HTML5,CSS3 & JavaScript</p>
  			</div>
  		</section>

		<div class="form">
     
      
          <div class="tab-content">
          <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action= "SERVER.php" method="post" style="margin-top:100px; border-color:#66FFFF;">
          	

		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="firstName">
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="lastName" >
		</div>
		<div class="input-group">
			<label>Email</label>
            <input type="email" name="email">

		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		
          </form>

          </div>
              
        <div id="login" style="float:right; margin-right: 50px;margin-top: -250px; " >   
          <h1>Welcome Back!</h1>
          
          <form action="index.php" method="post">
            
    <div class="field-wrap">
      <label style=" margin-right: 77px;">Email</label>
      <input type="text" name="email" class="req">
    </div>
    <div class="input-group">
      <label style="margin-right:48px;">Password</label>
      <input type="password" name="password" class="req">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
          </form>

        </div>
      </div>
        
      </div> <!-- /form -->
		
	     <!--footer-->

  		<footer style="margin-top:700px ;"  >
        <div class="container">
          <p>KATIA Enterprises Web Design,Copyright&copy; 2018</p>
        </div>
  		</footer>
  		
                
	</body>
</html>