<?php
$servername = "localhost";
$username = "u411818826_admin";
$password = "PjS3LZwzN9vr";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
