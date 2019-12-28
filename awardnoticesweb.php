<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
<table class="table table-striped">
		<tr>
	    <th>Title</th>
		<th>PDE</th>
		<th>Reference</th>
		<th>Action</th>
		</tr>
		
		<?php
include 'conne.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM awardnotices,  advup WHERE awardnotices.noticereference = advup.advreference";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		?>
		
		
		<tr>
		<td><?php echo $row["advtitle"]; ?></td>
		<td><?php echo $row["advdept"]; ?></td>
		<td><?php echo $row["noticereference"]; ?></td>
		<td><a href="awardnoticesdownload.php?aid=<?php echo $row["noticeid"]; ?>"><button type="button" class="btn btn btn-danger btn-sm">Download</button></td>
		
		<tr>
		
		
		<?php
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</table>