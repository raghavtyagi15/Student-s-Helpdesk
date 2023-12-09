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
    $Psociety = $_POST['Psociety'];
    $Idescription = $_POST['Idescription'];
    $Padate = $_POST['Padate'];
   
    $request = "INSERT INTO society (Fname, Lname, Enrol, Course, Sem, Psociety, Idescription, Padate) VALUES ('$Fname', '$Lname', '$Enrol','$Course', '$Sem', '$Psociety', '$Idescription', '$Padate')";
    $result = mysqli_query($con, $request);

    if ($result) {
        ob_start();
        header('Location: societies.php?message=success');
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