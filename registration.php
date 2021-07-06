<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	 $conn = new mysqli('sql113.epizy.com','epiz_29022709','Ab9doMEqD5c2','epiz_29022709_learn2earn','3306');
    
	// $conn = new mysqli('sql113.epizy.com','epiz_29022709','Ab9doMEqD5c2','epiz_29022709_learn2earn','3306');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("SELECT * FROM `registration`(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>