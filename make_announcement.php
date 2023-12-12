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
    $request = "INSERT INTO announcements (Title, Description) VALUES ('$Title', '$Description')";
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