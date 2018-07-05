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
           
        </script>
        
        <link rel="stylesheet" type="text/css" href="css.css" />
		</head>
		
		<body style="margin:0px">
        <div class="main" style="color:white">
			<div class="nav">
				<p style="color:white;margin-left:10%;font-size:20px;">MAINTANANCE TRACKER APPLICATION</p>
			</div>
			<div class="login" style="width:10%;margin-left:90%;"><h4> <a href="login.html" style="color:white;">LOG-OUT </a></h4> 
			</div>
			<div class="body" >
				<div class="view">
				<h1 style="color:black;margin-left:10%;">Admin Page</h1>
				
				
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
            <td><button> APPROVE</button><button name="delete_request"> DIS-APPROVE</button><button>RESOLVE</button></td>
		</tr>
 
		<?php } ?>
    </tbody>
    </table>
           
        </table>
		</div>
			
			</div>
			<div class="footer"></div>
			</div>
    </body>
</html>