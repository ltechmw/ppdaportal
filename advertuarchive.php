<?php
if (isset($_GET['aid'])) {
$aid=$_GET['aid'];
include 'conne.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE advup SET status='2' WHERE advID='$aid'";

if ($conn->query($sql) === TRUE) {
	header("Location: procurementnoticesdisplay.php");
    echo '<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!</strong> Your data has been archived successfully.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
} else {
    echo   '<div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> A problem has been occurred while archiving your data.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>';
}

$conn->close();
}
?>