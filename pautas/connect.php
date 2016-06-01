<?php
$servername = "localhost";
$username = "u411818826_admin";
$password = "PjS3LZwzN9vr";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
