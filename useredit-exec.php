<?php
include 'conne.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname= $_POST['fname'];
$lname= $_POST['lname'];
$org= $_POST['organisation'];
$email= $_POST['email'];
$user= $_POST['username'];
$pass= $_POST['password'];
$user1= $_POST['userID'];

$sql = "UPDATE users SET fname='$fname', lname='$lname', organisation='$org', email='$email', username='$user', password='$pass' WHERE usersID='$user1'";

if ($conn->query($sql) === TRUE) {
    header("Location: usersdisplay.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>