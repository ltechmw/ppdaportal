<!DOCTYPE html>
<html>
<body>

<?php
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];
$_SESSION['login_user']=$user; 

include 'conne.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		header('Location: adminis.php');
    }
} else {
    header("Location: login.php");
}

$conn->close();
		
?>

</body>
</html>