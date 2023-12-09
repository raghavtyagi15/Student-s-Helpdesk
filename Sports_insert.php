<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "helpdesk";

$con = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Enrol = $_POST['Enrol'];
    $Course = $_POST['Course'];
    $Sem = $_POST['Sem'];
    $Psports = $_POST['Psports'];
    $Intro = $_POST['Intro'];
    $Tdate = $_POST['date'];
   
    $request = "INSERT INTO sports (Fname, Lname, Enrol, Course, Sem, Psports, Intro, Tdate) VALUES ('$Fname', '$Lname', '$Enrol','$Course', '$Sem', '$Psports', '$Intro', '$Tdate')";
    $result = mysqli_query($con, $request);

    if ($result) {
        ob_start();
        header('Location: sports.php?message=success');
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