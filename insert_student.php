<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "helpdesk";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $enrol = $_POST['enrol'];
    $password = $_POST['password'];

    $request = "INSERT INTO users (name, username, enrol, password) VALUES ('$name', '$username', '$enrol','$password')";
    $result = mysqli_query($conn, $request);

    if ($result) {
        ob_start();
        header('Location: manage_students.php?message=success');
        ob_end_flush();
        exit();
    } else {
        echo "try again";
    }
} else {
    echo 'Something went wrong, try again';
}

// Close the connection
mysqli_close($conn);
?>