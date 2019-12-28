<?php
include 'conne.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$awardtitle=$_POST['awardtitle'];
$awarddescription=$_POST['awarddescription'];
$awardclosedate=$_POST['awardclosedate'];
$awardfile=$_FILES['awardfileToUpload']['name'];
$awarddepartment=$_POST['awarddepartment'];
$awardreference=$_POST['awardreference'];
$awardID=$_POST['awardID'];



$sql = "UPDATE intentionawardnotice SET awardtitle='$awardtitle', awarddescription='$awarddescription', awardclosedate='$awardclosedate', awarddepart='$awarddepartment', awardreference='$awardreference' WHERE awardID='$awardID'";

if ($conn->query($sql) === TRUE) {
    header("Location:intentionawarddisplay.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>