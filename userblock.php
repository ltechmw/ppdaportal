<?php
include 'conne.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "UPDATE users SET PPDAstatus = 'h3' WHERE usersID = '$user1'";

if ($conn->query($sql) === TRUE) {
    header("Location: usersdisplay.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>