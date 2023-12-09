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
    $Phone = $_POST['Phone'];
    $Course = $_POST['Course'];
    $Sem = $_POST['Sem'];
    $Description = $_POST['Description'];
    $Idate = $_POST['Idate'];
   
    $request = "INSERT INTO ragging (Fname, Lname, Enrol, Phone, Course, Sem, Description,Idate) VALUES ('$Fname', '$Lname', '$Enrol','$Phone', '$Course', '$Sem', '$Description', '$Idate')";
    $result = mysqli_query($con, $request);

    if ($result) {
        ob_start();
        header('Location: ragging.php?message=success');
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