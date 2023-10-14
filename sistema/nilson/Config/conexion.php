<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd = "sistemagrupo";

// Create connection
$conn = new mysqli($servername, $username, $password, $bd);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>