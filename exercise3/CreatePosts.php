<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "r229q057", "yuF4cuNa", "r229q057");

$username = $_POST["username"];
$userpost = $_POST["userpost"];

$blankInput = false;
$foundUser = false;

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

if ($username === "") {
  echo "Error! Your username cannot be blank.<br>";
  $blankInput = true;
}

if ($userpost === "") {
  echo "Error! Your post cannot be blank.<br>";
  $blankInput = true;
}

if (!$blankInput) {
  $query = "SELECT user_id FROM Users";
  if ($result = $mysqli->query($query)) {
    while ($userArray = $result->fetch_assoc()) {
      if ($userArray["user_id"] === $username) {
        $foundUser = true;
      }
    }
    if ($foundUser) {
      $query2 = "INSERT INTO Posts(content, author_id) VALUES('$userpost','$username')";
      if ($mysqli->query($query2)) {
        echo "Post successfully added!";
      }
    } else {
      echo "Error! Username does not exist.";
    }
  }
}

/* close connection */
$mysqli->close();
?>
