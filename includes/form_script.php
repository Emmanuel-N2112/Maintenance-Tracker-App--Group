<?php 
$_SESSION['message'] = " ";
$_SESSION['success-Message'] = " ";
$userId = $_SESSION['userId'];

/* MAKING A REQUEST */
	if (isset($_POST['makeRequest'])) {

		if (empty($_POST['orderTitle']) || empty($_POST['prdctNo']) || empty($_POST['devcName']) || empty($_POST['dueDate']) || empty($_POST['description'])) {

			$_SESSION['message'] = 'Enter required fields!';
			$error = 1;

		} else {
			$requestTitle = $_POST['orderTitle'];
			$description = $_POST['description'];
			$dueDate = $_POST['dueDate'];
			$deviceName = $_POST['devcName'];
			
			$pdNo = $_POST['prdctNo'];			

			$userId = $_SESSION['userId'];

			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

			$query = mysqli_query($connection, "SELECT * FROM device where ProductNo = '$pdNo' AND DeviceName = '$deviceName'");

			$rows = mysqli_num_rows($query);
			
			if ($rows == 1) {

				if ($connection) {
					//make new request
					$result = mysqli_query($connection, "INSERT INTO requests (OrderTitle, OrderDesc, DueDate, DeviceName, UserId) VALUES ('$requestTitle', '$description', '$dueDate', '$deviceName', '$userId')");

					if ($result) {
						//Redirect to another page
						$_SESSION['success-Message'] = "Request added Successfully";

					} else {
						$_SESSION['message'] = "Failure";
					} 
				} else {
					echo "Connection to database failed";
				}
				
			} else {
				$_SESSION['message'] = "That product doesn't exist";	
			}
		}		
	mysqli_close($connection); // Closing Connection
	}

/* ADDING DEVICE TO DATABASE */ 

	if (isset($_POST['addDevice'])) {
		$_SESSION['message'] = " ";

		if (empty($_POST['deviceName']) || empty($_POST['prdctNo']) || empty($_POST['ownerName']) || empty($_POST['deviceDesc'])) {

			$_SESSION['message'] = 'Enter required fields!';
			$error = 1;

		} else {
			$deviceName = $_POST['deviceName'];
			$pdNo = $_POST['prdctNo'];
			$manufacturer = $_POST['manFName'];
			$ownName = $_POST['ownerName'];
			$description = $_POST['deviceDesc'];
			$costPrice = $_POST['costPrice'];
			$purchaseDate = $_POST['purchaseDate'];

			$userId = $_SESSION['userId'];

			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

			$query = mysqli_query($connection, "SELECT * FROM device where ProductNo = '$pdNo' AND DeviceName = '$deviceName'");

			$rows = mysqli_num_rows($query);
			
			if ($rows == 1) {
				$_SESSION['message'] = "That product already exists";
				$error = 1;
			} else {

				if ($connection) {
					//insert new device
					$result = mysqli_query($connection, "INSERT INTO device (DeviceName, ProductNo, Manufacturer, DeviceOwner, DeviceDesc, CostPrice, PurchaseDate, UserId) VALUES ('$deviceName', '$pdNo', '$manufacturer', '$ownName', '$description', '$costPrice', '$purchaseDate', '$userId')");

					if ($result) {
						//Redirect to another page
						$_SESSION['success-Message'] = "Device added Successfully";

					} else {
						$_SESSION['message'] = "Failure";
					}
				} else {
					echo "Connection to database failed";
				}
			} echo "Error";
		}		
	mysqli_close($connection); // Closing Connection
	}

	/* UPDATING REQUEST AS A USER */
	if (isset($_POST['edit-request'])) {
		$_SESSION['message'] = " ";

		$row_Id = $_POST['id'];

		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

		if ($connection) {
			//update request status to be accepted
			$result = mysqli_query($connection, "UPDATE requests SET Status='Accepted' WHERE OrderId='$row_Id'");

			if ($result) {
				$_SESSION['message'] = "Request updated Successfully";

			} else {
				$_SESSION['message'] = "Failure to Update Request";
			}
		} else {
			echo "Connection to database failed";
		}
		mysqli_close($connection); // Closing Connection
	}

	/* UPDATING REQUEST AS AN ADMINISTRATOR */ 

	if (isset($_POST['update_accept'])) {
		$_SESSION['message'] = " ";

		$row_Id = $_POST['id'];

		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

		if ($connection) {
			//update request status to be accepted
			$result = mysqli_query($connection, "UPDATE requests SET Status='Accepted' WHERE OrderId='$row_Id'");

			if ($result) {
				$_SESSION['message'] = "Request updated Successfully";

			} else {
				$_SESSION['message'] = "Failure to Update Request";
			}
		} else {
			echo "Connection to database failed";
		}
		mysqli_close($connection); // Closing Connection
	}

	if (isset($_POST['update-start'])) {
		$_SESSION['message'] = " ";

		$row_Id = $_POST['id'];

		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

		if ($connection) {
			//update request status to be accepted
			$result = mysqli_query($connection, "UPDATE requests SET Status='Started' WHERE OrderId='$row_Id'");

			if ($result) {
				$_SESSION['message'] = "Request updated Successfully";

			} else {
				$_SESSION['message'] = "Failure to Update Request";
			}
		} else {
			echo "Connection to database failed";
		}
		mysqli_close($connection); // Closing Connection

	}

	if (isset($_POST['update-reject'])) {
		$_SESSION['message'] = " ";

		$row_Id = $_POST['id'];

		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

		if ($connection) {
			//update request status to be accepted
			$result = mysqli_query($connection, "UPDATE requests SET Status='Rejected' WHERE OrderId='$row_Id'");

			if ($result) {
				$_SESSION['message'] = "Request updated Successfully";

			} else {
				$_SESSION['message'] = "Failure to Update Request";
			}
		} else {
			echo "Connection to database failed";
		}
		mysqli_close($connection); // Closing Connection

	}

	if (isset($_POST['update-close'])) {
		$_SESSION['message'] = " ";

		$row_Id = $_POST['id'];

		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect("localhost", "root", "", "maintenance tracker app");

		if ($connection) {
			//update request status to be accepted
			$result = mysqli_query($connection, "UPDATE requests SET Status='Closed' WHERE OrderId='$row_Id'");

			if ($result) {
				//Redirect to another page
				$_SESSION['message'] = "Request updated Successfully";

			} else {
				$_SESSION['message'] = "Failure to Update Request";
			}
		} else {
			echo "Connection to database failed";
		}
		mysqli_close($connection); // Closing Connection

	}
?>
	