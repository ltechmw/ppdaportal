<?php
include 'conne.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Downloads files
if (isset($_GET['aid'])) {
    $id = $_GET['aid'];

    // fetch file to download from database
    $sql = "SELECT * FROM intentionawardnotice WHERE awardID=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'awards/' . $file['awardfile'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('awards/' . $file['awardfile']));
        readfile('uploads/' . $file['awardfile']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE advup SET downloads=$newCount WHERE awardID=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>