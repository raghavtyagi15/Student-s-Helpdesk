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
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Enrol = $_POST['Enrol'];
    $Course = $_POST['Course'];
    $Sem = $_POST['Sem'];
    $Reason = $_POST['Reason'];
    $Sdate = $_POST['Sdate'];
    $Edate = $_POST['Edate'];

    $request = "INSERT INTO medical (Fname, Lname, Enrol, Course, Sem, Reason, Sdate, Edate) VALUES ('$Fname', '$Lname', '$Enrol', '$Course', '$Sem', '$Reason', '$Sdate', '$Edate')";
    $result = mysqli_query($con, $request);

    if ($result) {
        ob_start();
        header('Location: medicalapp.php?message=success');
        ob_end_flush();
        exit();
    } else {
        echo "try again";
    }
} else {
    echo 'Something went wrong, try again';
}

// Close the connection
mysqli_close($con);
?>