<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "r229q057", "yuF4cuNa", "r229q057");

$username = $_POST["username"];

$blankUsername = false;

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

if($username === "") {
	echo"Error! Your username cannot be blank.<br>";
	$blankUsername = true;
}

if (!$blankUsername) {
	$query = "INSERT INTO Users(user_id) VALUES ('$username')";
	if ($mysqli->query($query)) {
			echo"Username successfully added!<br>";
	} else {
			echo"Error! The username you are trying to add already exists in the database.<br>";
	}
}

/* close connection */
$mysqli->close();
?>
