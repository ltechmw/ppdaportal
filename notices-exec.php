<?php

if (isset($_POST['submit2'])) {
include 'conne.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$noticereference=$_POST['noticereference'];

// if save button on the form is clicked
    // name of the uploaded file
	
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'notices/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['pdf', 'docx', 'doc'])) {
       
		
				$feedfile1 =  '<div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> You file extension must be .zip, .pdf or .docx.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>';

		
    } elseif ($_FILES['myfile']['size'] > 20000000) { // file shouldn't be larger than 1Megabyte
        
		$feedfile =  '<div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> File too large.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>';
		
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
           
			$sql = "INSERT INTO awardnotices (noticefile,noticereference,size,downloads)VALUES ('$filename','$noticereference','$size',0)";

            if (mysqli_query($conn, $sql)) {
                $feedback = '<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!</strong> Your data has been inserted successfully.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
            }
        } else {
            $feedback1 =  '<div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> A problem has been occurred while submitting your data.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>';
        }
    }


$conn->close();
}
?>