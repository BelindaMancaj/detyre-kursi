<?php
$servername = "localhost";
$username = "root";
$password = "";
$datab = "forum";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $datab);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>