<?php include('server.php')?>

<html>
    <head>
        <title> MAINTANANCE TRACKER APPLICATION </title>
        <meta charset = "UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css.css" />
	</head>	
       <body style="margin:0px">
        <div class="main" style="color:white">
			<div class="nav">
				<p style="color:white;margin-left:10%;font-size:20px;">MAINTANANCE TRACKER APPLICATION</p>
			</div>
			<div class="login" style="width:20%;margin-left:80%;">
			<h3 style="float:left"> <a href="user_page.php" style="color:white;">User Page</a></h3> 
			<h3 style="float:left"> <a href="login.php" style="color:white;margin-left:20px;">Log Out </a></h3>
			</div>
            <form method="post" action="Create_Requests.php">
			<div class="body" >
                <?php include('errors.php'); ?>
				<div class="register">
                    
				<h1 style="text-align:center;color:white;">Request Board</h1>
					<p style="color:white; margin:10px;">Id No: <input type="text" style="margin-left:50px;height:30px;" placeholder="Id " name="id_no" value="<?php echo $id_no; ?>"></p>
					<p style="color:white; margin:10px;">Type: <input type="text" style="margin-left:55px;height:30px;" placeholder="Type" name="type" value="<?php echo $type; ?>"></p>
					<p style="color:white; margin:10px;">Description: <input type="text" style="margin-left:12px;height:30px;" placeholder="Description" name="description" value="<?php echo $description; ?>"></p>
					<p style="color:white; margin:10px;">Remark: <input type="text" style="margin-left:35px;height:30px;" placeholder="Remark" name="remark" value="<?php echo $remark; ?>"></p>
					
					 <button style="margin-left:25%;width:40%; height:30px;" class="btn" type="submit" name="create_request"> <h3 style="margin-top:0px;"> Send </h3> </button>  
                    
				</div>

			</div>
                </form>
			<div class="footer"></div>
			</div>
           
           <?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="login.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
    </body>
</html>