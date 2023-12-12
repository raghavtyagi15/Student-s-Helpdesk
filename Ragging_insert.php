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

    // File upload handling for Proof
    $proofFileName = $_FILES['Proof']['name'];
    $proofTmpName = $_FILES['Proof']['tmp_name'];
    $proofFileSize = $_FILES['Proof']['size'];
    $proofFileError = $_FILES['Proof']['error'];

    // Check if a file was uploaded without errors
    if ($proofFileError === 0) {
        // Move the uploaded file to the "assets" directory
        $proofDestination = 'assets/' . $proofFileName;
        move_uploaded_file($proofTmpName, $proofDestination);
    } else {
        echo "Proof upload error: " . $proofFileError;
        exit();
    }

    // Insert data into the database
    $request = "INSERT INTO ragging (Fname, Lname, Enrol, Phone, Course, Sem, Description, Idate, Proof) 
                VALUES ('$Fname', '$Lname', '$Enrol', '$Phone', '$Course', '$Sem', '$Description', '$Idate', '$proofDestination')";
    
    $result = mysqli_query($con, $request);

    if ($result) {
        ob_start();
        header('Location: ragging.php?message=success');
        ob_end_flush();
        exit();
    } else {
        echo "Database insert error: " . mysqli_error($con);
    }
} else {
    echo 'Something went wrong, try again';
}

// Close the connection
mysqli_close($con);
?>