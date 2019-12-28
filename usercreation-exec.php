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
$role= $_POST['role'];

$sql = "INSERT INTO users (fname, lname, organisation, email, username, password, PPDrole)
VALUES ('$fname', '$lname', '$org', '$email', '$user','$pass', '$role')";

if ($conn->query($sql) === TRUE) {
    header("Location: usersdisplay.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>