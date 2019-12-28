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
    $sql = "SELECT * FROM advup WHERE advID=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['advfile'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['advfile']));
        readfile('uploads/' . $file['advfile']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE advup SET downloads=$newCount WHERE advID=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>