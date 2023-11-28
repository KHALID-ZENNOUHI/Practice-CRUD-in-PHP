<?php
$servername = "localhost";
$username = "root";
$password = "";
$dataBase = "my_ressources";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dataBase);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>