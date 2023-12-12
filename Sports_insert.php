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
    $Psports = $_POST['Psports'];
    $Intro = $_POST['Intro'];
    $Tdate = $_POST['date'];

    $ypictureFileName = $_FILES['Ypicture']['name'];
    $ypictureTmpName = $_FILES['Ypicture']['tmp_name'];
    $ypictureFileSize = $_FILES['Ypicture']['size'];
    $ypictureFileError = $_FILES['Ypicture']['error'];

    if ($ypictureFileError === 0) {
        $ypictureDestination = 'assets/' . $ypictureFileName;
        move_uploaded_file($ypictureTmpName, $ypictureDestination);
        $request = "INSERT INTO sports (Fname, Lname, Enrol, Course, Sem, Psports, Intro, Tdate, Ypicture) 
                    VALUES ('$Fname', '$Lname', '$Enrol', '$Course', '$Sem', '$Psports', '$Intro', '$Tdate', '$ypictureDestination')";

        $result = mysqli_query($con, $request);

        if ($result) {
            ob_start();
            header('Location: sports.php?message=success');
            ob_end_flush();
            exit();
        } else {
            echo "Database insert error: " . mysqli_error($con);
        }
    } else {
        header('Location: sports.php?message=tryagain');
        exit();
    }
} else {
    echo 'Something went wrong, try again';
}

mysqli_close($con);
?>