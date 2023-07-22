<?php
	include 'config.php';
	session_start();

	if(isset($_SESSION['admin'])){
		header('location: add_product.php');
		exit;
	}

	if(isset($_SESSION['user'])){
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		}

		$user = null;

		try{
			$stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
			$stmt->bind_param("i", $_SESSION['user']);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result->num_rows > 0) {
				$user = $result->fetch_assoc();
			}

			$stmt->close();
		}
		catch(Exception $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$con->close();
	}
?>
