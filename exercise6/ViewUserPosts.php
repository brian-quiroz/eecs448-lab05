<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "r229q057", "yuF4cuNa", "r229q057");

/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$userSelected  = $_POST["selection"];

$postsFound = false;
$postCounter = 0;

$query = "SELECT author_id, content FROM Posts";

if ($result = $mysqli->query($query)) {
  echo "<h1 style='text-align: center; color: #0079b6; font-family: Helvetica;' class='text-center'>View User Posts</h1>";
  echo "<table>" . "<th align='left'>Posts by ". $userSelected . "</th>";
  while ($row = $result->fetch_assoc()) {
    if ($userSelected == $row["author_id"]) {
      $postCounter++;
      echo "<tr><td>" . $postCounter . ") " . $row["content"] . "</td></tr>";
      $postsFound = true;
    }
  }
  echo "</table>";

  if (!$postsFound) {
    echo "<i>Unfortunately, ". $userSelected . " has not posted anything.</i>";
  }

}

/* close connection */
$mysqli->close();

?>
