<?php
include 'conne.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$awardID=$_GET['id'];



$sql = "UPDATE awardnotices SET status='1' WHERE noticeid='$awardID'";

if ($conn->query($sql) === TRUE) {
    header("Location:awardnoticesarchive.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>