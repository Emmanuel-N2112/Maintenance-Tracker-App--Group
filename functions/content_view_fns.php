<?php
	$_SESSION['userId'] = $login_id;
?>

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

	function display_userview_content() {

?>
		<div class="body-content text-justify">
            <h2>Maintenance Tracker App</h2>
            <p class="content text-justify">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
			<p class="content text-justify">Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).</p>
		</div>

		<?php
	}

?>

<?php 

	function display_userRequest_content() {

?>
		<div class="body-content text-justify">
                <h2>My Requests</h2>
                    <a href="viewRequest.php" class="btn1">
                        <span class="icon-database"> </span>View My Requests
                    </a>
                    <a href="addRequest.php" class="btn1">
                        <span class="icon-plus"> </span>Add A Request
                    </a>
                    
		      </div>
<?php
	}
?>

<?php 

	function display_userassets_content() {

?>
		<div class="body-content text-justify">
                <h2>My Devices</h2>
                    <a href="viewDevices.php" class="btn1">
                        <span class="icon-database"> </span>View My Devices
                    </a>
                    <a href="addDevice.php" class="btn1">
                        <span class="icon-plus"> </span>Add My Devices
                    </a> 
		      </div>
<?php
	}
?>

<?php 

	function display_viewRequest() {

        include("../includes/form_script.php");

?>
		<div class="body-content text-justify">
                <h2>View Requests</h2>

                <?php 
                	/* view values in table */

                	// Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
					$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

					$sql = "SELECT * FROM requests WHERE UserId = '$userId'";

					$result = mysqli_query($connection, $sql);

					if (mysqli_num_rows($result) > 0) {
				    	// output data of each row
				    	while($row = mysqli_fetch_assoc($result)) {
                            $row_id = $row['OrderId'];

				        echo "<table class='table'>
				        		<tr>
				        			<th class='colmn-lg-width'>Request Id: ". $row["OrderId"]. "</th>
                                    <th class='colmn-shrt-width'>Action</th>
				        		</tr>
				        		<tr>
				        			<td class='colmn-lg-width'>Request Summary: " . $row["OrderTitle"]. "</td>
                                    <td class='colmn-shrt-width'>
                                        <input type='hidden' name='id' value='$row_id'>
                                        <input id='myBtn' type='submit' class='update-btn accept-btn' value='Edit'>
                                        <a href='#edit' class='modal-btn'>Edit</a>
                                        <button type='button' class='update-btn reject-btn'>Delete</button>
                                    </td>
				        		</tr>
				        		<tr>
				        			<td class='colmn-lg-width'>Description: " . $row["OrderDesc"]. "</td>
				        		</tr>
				        		<tr>
				        			<td class='colmn-lg-width'>Due Date: " . $row["DueDate"]. "</td>
				        		</tr>
				        		<tr>
				        			<td class='colmn-lg-width'>Device Name : " . $row["DeviceName"]. "</td>
				        		</tr>
				        	</table>";

                            echo '
                            <!--Edit Modal -->
                            <div id="edit" class="modal">
                                <!-- Modal Content -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a href="#"><span class="close">&times;</span></a>
                                        <h3>Edit Request</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form3" method="post" action=" ">
                                            <input type="text" name="id" value="'.$row["OrderId"].'">
                                            <input type="text" name="" value="'.$row["OrderTitle"].'">
                                            <textarea type="text" placeholder="'.$row["OrderDesc"].'"></textarea>
                                            <input type="date" name="dueDate" value="'.$row["DueDate"].'">
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <script>
                                // Get the modal
                                var modal = document.getElementById("myModal");

                                // Get the button that opens the modal
                                var btn = document.getElementById("myBtn");

                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];

                                // When the user clicks the button, open the modal 
                                btn.onclick = function() {
                                    modal.style.display = "block";
                                }

                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function() {
                                    modal.style.display = "none";
                                }

                                // When the user clicks anywhere outside of the modal, close it
                                window.onclick = function(event) {
                                    if (event.target == modal) {
                                        modal.style.display = "none";
                                    }
                                }
                                </script>
                            ';
				    	}
					} else {
				    echo "<div class='not-found'> No requests available yet</div>";
					}
					
					mysqli_close($connection);

                ?>

		      </div>
<?php
	}
?>

<?php 

	function display_viewDevices() {

        include("../includes/form_script.php");

?>
		<div class="body-content text-justify">
                <h2>View Devices</h2>

                <?php 
                    /* view values in table */

                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                    $sql = "SELECT * FROM device WHERE UserId = '$userId'";

                    $result = mysqli_query($connection, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                       echo "<table class='table'>
                                    <tr>
                                        <th>Device Id: ". $row["DeviceId"]. "</th>
                                    </tr>
                                    <tr>
                                        <td>Device Name: " . $row["DeviceName"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Product Number: " . $row["ProductNo"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Manufacturer: " . $row["Manufacturer"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Device Owner : " . $row["DeviceOwner"]. "</td>
                                    </tr>
                                </table>";
                        }
                    } else {
                    echo "<div class='not-found'> No device available yet</div>";
                    }
                    
                    mysqli_close($connection);

                ?>

		      </div>
<?php
	}
?>

<?php

	function display_addRequest_content() {

		include("../includes/form_script.php");

?>
			<div class="body-content text-justify">
                <h2>Make Request</h2>
                <div class="form2">
                    <form method="post" action="">
                    	<div class="error-message"><?php echo "<p>".$_SESSION['message']."</p>"; ?></div>
                        <div class="row">
                            <label class="col-25">Request Title <span class="required">*</span></label>
                            <span class="col-75">
                                <input type="text" name="orderTitle">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Product model number <span class="required">*</span></label>
                            <span class="col-75">
                                <input type="text" name="prdctNo">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Device Name <span class="required">*</span></label>
                            <span class="col-75">
                                <input type="text" name="devcName">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Description <span class="required">*</span></label>
                            <span class="col-75">
                                <textarea type="text" placeholder="Write something..." name="description"></textarea>
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Due Date <span class="required">*</span></label>
                            <span class="col-75">
                                <input type="date" name="dueDate">
                            </span>
                        </div>
                        <div class="row">
                            <span class="col-25"></span>
                            <span class="col-75">
                                <input type="submit" name="makeRequest" value="Make Request" class="add-btn">
                                <input type="submit" name="cancelRequest" value="Cancel" class="cancel-btn">
                            </span>
                        </div>
                        <div class="success-message"><?php echo "<p>".$_SESSION['success-Message']."</p>"; ?></div>
                    </form>
                </div>
                
		      </div>

<?php
	}
?>

<?php

	function display_addDevice_content() {

		include("../includes/form_script.php");

?>
			<div class="body-content text-justify">
                <h2>Add Device</h2>
                <div class="form2">
                    <form method="post" action="">
                    	<div class="error-message"><?php echo "<p>".$_SESSION['message']."</p>"; ?></div>
                        <div class="row">
                            <label class="col-25">Device Name <span class="required">*</span></label>
                            <span class="col-75">
                                <input type="text" name="deviceName">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Product model number <span class="required">*</span></label>
                            <span class="col-75">
                                <input type="text" name="prdctNo">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Category</label>
                            <span class="col-75">
                                 <select>
                                     <option value="volvo">Electronic</option>
                                     <option value="saab">Automobile</option>
                                     <option value="opel">Building</option>
                                     <option value="other">Other</option>
                                </select> 
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Manufacturer Name</label>
                            <span class="col-75">
                                <input type="text" name="manFName">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Owner/ Assigned To <span class="required">*</span></label>
                            <span class="col-75">
                                <input type="text" name="ownerName">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Description <span class="required">*</span></label>
                            <span class="col-75">
                                <textarea type="text" name="deviceDesc" placeholder="Write something..."></textarea>
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Cost Price</label>
                            <span class="col-75">
                                <input type="text" name="costPrice">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Purchased on</label>
                            <span class="col-75">
                                <input type="date" name="purchaseDate">
                            </span>
                        </div>
                        <div class="row">
                            <span class="col-25"></span>
                            <span class="col-75">
                                <input type="submit" name="addDevice" value="Add Device" class="add-btn">
                                <input type="submit" name="cancelDevice" value="Cancel" class="cancel-btn">
                            </span>
                        </div>
                        <div class="success-message"><?php echo "<p>".$_SESSION['success-Message']."</p>"; ?></div>
                    </form>
                </div>
                
		      </div>

<?php
	}
?>

<?php

	function display_requestDetails_menu1() {
?>
			<div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2 active-2" href="requestOrder.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderClosed.php">Closed</a></li>
                            </ul>
                        </div> 
	
<?php
	}
?>

<?php

	function display_requestDetails_menu2() {
?>
			<div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="requestOrder.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="requestOrderInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderClosed.php">Closed</a></li>
                            </ul>
                        </div> 
	
<?php
	}
?>


<?php

	function display_requestDetails_menu3() {
?>
			<div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="requestOrder.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="requestOrderRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderClosed.php">Closed</a></li>
                            </ul>
                        </div> 
	
<?php
	}
?>

<?php

	function display_requestDetails_menu4() {
?>
			<div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="requestOrder.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="requestOrderClosed.php">Closed</a></li>
                            </ul>
                        </div> 
	
<?php
	}
?>

<?php

	function display_requestDetails_content($num) {
        include("../includes/form_script.php");

?>
                    <?php
                    
                        echo "<div style='padding-top: 25px'></div>";
                            // Accepted
                            
                            if ($num == 1) {
                                // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                $sql = "SELECT * FROM requests WHERE Status='Accepted' AND UserId='$userId'";

                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of accepted requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($connection);
                            }

                            // In progress

                            if ($num == 2) {
                                // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                $sql = "SELECT * FROM requests WHERE Status='Started' AND UserId='$userId'";

                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of requests in progress
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($connection);
                            }

                            // Rejected

                            if ($num == 3) {
                                // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                $sql = "SELECT * FROM requests WHERE Status='Rejected' AND UserId='$userId'";

                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of rejected requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($connection);
                            }

                            // Closed

                            if ($num == 4) {
                                // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                $sql = "SELECT * FROM requests WHERE Status='Closed' AND UserId='$userId'";

                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of closed requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($connection);
                            }
                        ?>
                    </div>
                    <div class="tb2">
                        <h3>Details/</h3>
                        
                    </div>
                </div>
		      </div>
        </div>
<?php
	}
?>

<?php 

	function display_dashboard()  {

        include("../includes/form_script.php");

?>
            <div class="body-content">
                <h2>Dashboard</h2>
                <div class="dashboard">
                    <div class="box-big-fluid">
                        <div class="box">
                            <h3>Total Request Orders</h3>
                            <p class="wd2">
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests WHERE UserId = '$userId'";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Accepted Requests</h3>
                            <p class="wd3">
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests WHERE Status='Accepted' AND UserId='$userId'";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Requests In Progress</h3>
                            <p class="wd4">
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests WHERE Status='Started' AND UserId='$userId'";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>                                
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Rejected Requests</h3>
                            <p class="wd1"> 
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests WHERE Status='Rejected' AND UserId='$userId'";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Closed</h3>
                            <p class="wd5">
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests WHERE Status='Closed' AND UserId='$userId'";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%2333ffff&amp;src=en.ug%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Africa%2FNairobi" frameborder="0" scrolling="no"></iframe>
            </div>
         </div>


<?php
	}
?>

<?php

    function display_userProfile() {

?>
            
            <div class="body-content text-justify">
                <h2>Profile</h2>
                <div class="form2">
                    <form method="" action="">
                        <div class="row">
                            <label class="col-25">Username</label>
                            <span class="col-75">
                                <input type="text">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Description</label>
                            <span class="col-75">
                                <textarea type="text" placeholder="Write something..."></textarea>
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Email</label>
                            <span class="col-75">
                                <input type="text">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Location</label>
                            <span class="col-75">
                                <input type="text">
                            </span>
                        </div>
                        <div class="row">
                            <label class="col-25">Phone number</label>
                            <span class="col-75">
                                <input type="tel" class="col-75">
                            </span>
                        </div>
                        <div class="row">
                            <span class="col-25"></span>
                            <span class="col-75">
                                <input type="submit" value="Save Changes" class="add-btn">
                                <input type="submit" value="Cancel" class="cancel-btn">
                            </span>
                        </div>
                    </form>
                </div>
                
              </div>
<?php
    }
?>

<!-- ADMINISTRATOR CONTENT-->


<?php

	function display_adminview_content() {

?>
		<div class="body-content text-justify">
            <h2>Maintenance Tracker App</h2>
            <p class="content text-justify">This is the administrator's view content</p>
			<p class="content text-justify">Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).</p>
		</div>

		<?php
	}

?>

<?php

    function display_adminRequest_menu1() {
?>
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2 active-2" href="adminRequestsDetails.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestClosed.php">Closed</a></li>
                            </ul>
                        </div> 
    
<?php
    }
?>

<?php

    function display_adminRequest_menu2() {
?>
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="adminRequestsDetails.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="adminRequestInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestClosed.php">Closed</a></li>
                            </ul>
                        </div> 
    
<?php
    }
?>

<?php

    function display_adminRequest_menu3() {
?>
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="adminRequestsDetails.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="adminRequestRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestClosed.php">Closed</a></li>
                            </ul>
                        </div> 
    
<?php
    }
?>

<?php

    function display_adminRequest_menu4() {
?>
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="adminRequestsDetails.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="adminRequestClosed.php">Closed</a></li>
                            </ul>
                        </div> 
    
<?php
    }
?>

<?php 

    function display_adminRequests_content() {

?>
        <div class="body-content text-justify">
                <h2>Submitted Requests</h2>
                <div><?php echo "<p>".$_SESSION['message']."</p>"; ?></div>

                <?php 

                    include("../includes/form_script.php");
                    /* view values in table */

                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                    $sql = "SELECT * FROM requests";

                    $result = mysqli_query($connection, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output all requests in the system
                        while($row = mysqli_fetch_assoc($result)) {
                            $row_id = $row['OrderId'];

                            echo "<table class='table' style='border:1 solid #000'>
                                    <tr>
                                        <th class='colmn-lg-width'>Request Id: ". $row["OrderId"]. "</th>
                                        <th class='colmn-shrt-width'>Action</th>
                                    </tr>
                                    <tr>
                                        <td class='colmn-lg-width'>Request Summary: " . $row["OrderTitle"]. "</td>
                                        <td class='colmn-shrt-width'>
                                            <form method='post' action=''>
                                                <input type='hidden' name='id' value='$row_id'>
                                                <input type='submit' name='update_accept' class='update-btn accept-btn' value='Accept'> 
                                                <input type='submit' name='update-start' class='update-btn start-btn' value='Start'>
                                                <input type='submit' name='update-reject' class='update-btn reject-btn' value='Reject'>
                                                <input type='submit' name='update-close' class='update-btn closed-btn' value='Close'>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='colmn-lg-width'>Description: " . $row["OrderDesc"]. "</td>
                                    </tr>
                                    <tr>
                                        <td class='colmn-lg-width'>Due Date: " . $row["DueDate"]. "</td>
                                    </tr>
                                    <tr>
                                        <td class='colmn-lg-width'>Device Name : " . $row["DeviceName"]. "</td>
                                    </tr>
                                    <tr>
                                        <td class='colmn-lg-width'>Request Status : " . $row["Status"]. "</td>
                                    </tr>
                                </table>";
                        }
                    } else {
                    echo "<div class='not-found'> No requests available yet</div>";
                    }
                    
                    mysqli_close($connection);

                ?>
            </div>
<?php 
}
?>


<?php

    function display_adminRequestDetails_content($num) {

?>
            
                        <?php

                            echo "<div style='padding-top: 25px'></div>";
                            // Accepted
                            
                            if ($num == 1) {
                                // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                $sql = "SELECT * FROM requests WHERE Status='Accepted'";

                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of accepted requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($connection);
                            }

                            // In progress

                            if ($num == 2) {
                                // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                $sql = "SELECT * FROM requests WHERE Status='Started'";

                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of requests in progress
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($connection);
                            }

                            // Rejected

                            if ($num == 3) {
                                // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                $sql = "SELECT * FROM requests WHERE Status='Rejected'";

                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of rejected requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($connection);
                            }

                            // Closed

                            if ($num == 4) {
                                // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                $sql = "SELECT * FROM requests WHERE Status='Closed'";

                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of closed requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($connection);
                            }
                        ?>
                    </div>
                    <div class="tb2">
                        <h3>Details/</h3>
                        
                    </div>
                </div>
              </div>
        </div>
<?php
    }
?>

<?php 

    function display_devices() {

?>
        <div class="body-content text-justify">
                <h2>View Devices</h2>

                <?php 
                    /* view values in table */

                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                    $sql = "SELECT * FROM device";

                    $result = mysqli_query($connection, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                       echo "<table class='table'>
                                    <tr>
                                        <th>Device Id: ". $row["DeviceId"]. "</th>
                                    </tr>
                                    <tr>
                                        <td>Device Name: " . $row["DeviceName"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Product Number: " . $row["ProductNo"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Manufacturer: " . $row["Manufacturer"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Device Owner : " . $row["DeviceOwner"]. "</td>
                                    </tr>
                                </table>";
                        }
                    } else {
                    echo "<div class='not-found'> No device available yet</div>";
                    }
                    
                    mysqli_close($connection);

                ?>

              </div>
<?php
    }
?>


<?php 

    function display_admin_dashboard()  {

?>
            <div class="body-content">
                <h2>Dashboard</h2>
                <div class="dashboard">
                    <div class="box-big-fluid">
                        <div class="box">
                            <h3>Total Request Orders</h3>
                            <p class="wd2">
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Accepted Requests</h3>
                            <p class="wd3">
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests WHERE Status='Accepted'";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Requests In Progress</h3>
                            <p class="wd4">
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests WHERE Status='Started'";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Rejected Requests</h3>
                            <p class="wd1">
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests WHERE Status='Rejected'";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Closed</h3>
                            <p class="wd5">
                                <?php 

                                    // Establishing Connection with Server and database by passing server_name, user_id, password and database name as a parameter
                                    $connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

                                    $sql = "SELECT * FROM requests WHERE Status='Closed'";

                                    $result = mysqli_query($connection, $sql);

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    
                                    mysqli_close($connection);

                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%2333ffff&amp;src=en.ug%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Africa%2FNairobi" frameborder="0" scrolling="no"></iframe>
            </div>
         </div>


<?php
    }
?>

