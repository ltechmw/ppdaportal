<?php
include 'conne.php';
$userID=$_GET['id'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM users WHERE usersID = '$userID'";

if (mysqli_query($conn, $sql)) {
    header("Location: usersdisplay.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>