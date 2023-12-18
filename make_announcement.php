<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "helpdesk";
$con = mysqli_connect($host, $user, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $ExternalLink = $_POST['ExternalLink']; // New field for External Link
    $PdfFile = $_FILES['PdfFile']['name']; // New field for PDF File

    // Move uploaded file to a folder (adjust folder path as needed)
    $target_folder = "assets/";
    $target_file = $target_folder . basename($_FILES['PdfFile']['name']);
    move_uploaded_file($_FILES['PdfFile']['tmp_name'], $target_file);

    $request = "INSERT INTO announcements (Title, Description, ExternalLink, PdfFile) VALUES ('$Title', '$Description', '$ExternalLink', '$PdfFile')";
    
    $result = mysqli_query($con, $request);

    if ($result) {
        ob_start();
        header('Location: admin_announcement.php?message=success');
        ob_end_flush();
        exit();
    } else {
        echo "try again";
    }
} else {
    echo 'Something went wrong, try again';
}

mysqli_close($con);
?>