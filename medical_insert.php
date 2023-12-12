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


    $certificateFileName = $_FILES['Certificate']['name'];
    $certificateTmpName = $_FILES['Certificate']['tmp_name'];
    $certificateFileSize = $_FILES['Certificate']['size'];
    $certificateFileError = $_FILES['Certificate']['error'];


    if ($certificateFileError === 0) {
        $allowedFileTypes = ['application/pdf'];
        $fileType = mime_content_type($certificateTmpName);

        if (!in_array($fileType, $allowedFileTypes)) {
            echo "Invalid file type. Only PDF files are allowed.";
            exit();
        }

 
        $certificateDestination = 'assets/' . $certificateFileName;
        move_uploaded_file($certificateTmpName, $certificateDestination);
    } else {
        echo "File upload error: " . $certificateFileError;
        exit();
    }

    $request = "INSERT INTO medical (Fname, Lname, Enrol, Course, Sem, Reason, Sdate, Edate, Certificate) 
                VALUES ('$Fname', '$Lname', '$Enrol', '$Course', '$Sem', '$Reason', '$Sdate', '$Edate', '$certificateDestination')";

    $result = mysqli_query($con, $request);

    if ($result) {
        ob_start();
        header('Location: medicalapp.php?message=success');
        ob_end_flush();
        exit();
    } else {
        echo "Database insert error: " . mysqli_error($con);
    }
} else {
    echo 'Something went wrong, try again';
}

mysqli_close($con);
?>