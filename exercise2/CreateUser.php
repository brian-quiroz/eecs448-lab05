<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "r229q057", "yuF4cuNa", "r229q057");

$username = $_POST["username"];

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "INSERT INTO Users(user_id) VALUES ('$username')";

if($username == "") {
	echo"Error! The username cannot be blank.";
} else {
	if ($mysqli->query($query)) {
		echo"Name successfully added!";
	} else {
		echo"Error! The username you are trying to add already exists in the database.";
	}
}

/* close connection */
$mysqli->close();
?>
