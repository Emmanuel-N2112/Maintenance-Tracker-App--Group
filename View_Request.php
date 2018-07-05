<?php include('server.php') ?>
<html>
    <head>
        <title> MAINTANANCE TRACKER APPLICATION </title>
        <meta charset = "UTF-8"/>
        <script>
           img.medium {
               width: 250px;
               height: 250px;
           }
           img.align-left {
               display: block;
               margin: 0px auto;
           }
           h3{
		   color:white;
		   
		   }
		   input{
		   height:30px !important;
		   margin-top:10px;
		   }
        </script>
		
        <link rel="stylesheet" type="text/css" href="css.css" />
		</head>
        
	<body>
       
		<body style="margin:0px">
        <div class="main" style="color:white">
			<div class="nav">
				<p style="color:white;margin-left:10%;font-size:20px;">MAINTANANCE TRACKER APPLICATION</p>
			</div>
			<div class="login" style="width:20%;margin-left:80%;">
			<h3 style="float:left"> <a href="User_page.php" style="color:white;">User Page</a></h3> 
			<h3 style="float:left"> <a href="login.php" style="color:white;margin-left:10px;">Log Out </a></h3> 
			</div>
			<div class="body" >
				<div class="view">
				<div class="titles">
                     <table>
        <thead>
		<tr>
			<th>id_no</th>
			<th>type</th>
			<th>description</th>
			<th>remark</th>
		</tr>
	</thead>
	<tbody>
    <tbody>
    <?php
		$result = $conn->prepare("SELECT * FROM  requests ORDER BY id_no ASC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<tr>
			<td><label><?php echo $row['id_no']; ?></label></td>
			<td><label><?php echo $row['type']; ?></label></td>
			<td><label><?php echo $row['description']; ?></label></td>
            <td><label><?php echo $row['remark']; ?></label></td>
		</tr>
 
		<?php } ?>
    </tbody>
    </table>
				</div>
			
			</div>
			<div class="footer"></div>
			</div>
        
        
    </body>
</html>