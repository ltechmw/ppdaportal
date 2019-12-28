<?php

if (isset($_POST['submit1'])) {
include 'conne.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pde=$_POST['pde'];



			
			$sql = "INSERT INTO procuringenity(proname)VALUES ('$pde')";
			
            if (mysqli_query($conn, $sql)) {
                $feedback = '<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!</strong> Your data has been inserted successfully.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
            }
         else {
            $feedback1 =  '<div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> A problem has been occurred while submitting your data.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>';
        }
    


$conn->close();
}
?>