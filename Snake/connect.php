<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
    $conn = new mysqli('localhost','root','','snake');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into game(username, password) values(?, ?)");
		$stmt->bind_param("ss", $username, $password);
		$execval = $stmt->execute();
        echo $execval;
		header('Location: http://' . $_SERVER['HTTP_HOST'] . '/Snake/index1.html');		
		$stmt->close();
        $conn->close();
    }
?>