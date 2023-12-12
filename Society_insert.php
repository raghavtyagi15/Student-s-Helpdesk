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

    // File upload handling for Portfolio (PDF)
    $portfolioFileName = $_FILES['Portfolio']['name'];
    $portfolioTmpName = $_FILES['Portfolio']['tmp_name'];
    $portfolioFileSize = $_FILES['Portfolio']['size'];
    $portfolioFileError = $_FILES['Portfolio']['error'];

    // Check if a file was uploaded without errors
    if ($portfolioFileError === 0) {
        // Check file type (allow only PDF)
        $allowedPortfolioTypes = ['application/pdf'];
        $portfolioType = mime_content_type($portfolioTmpName);

        if (!in_array($portfolioType, $allowedPortfolioTypes)) {
            echo "Invalid file type for Portfolio. Only PDF files are allowed.";
            exit();
        }

        // Move the uploaded file to the "uploads" directory
        $portfolioDestination = 'assets/' . $portfolioFileName;
        move_uploaded_file($portfolioTmpName, $portfolioDestination);
    } else {
        echo "Portfolio upload error: " . $portfolioFileError;
        exit();
    }

    // Insert data into the database
    $request = "INSERT INTO society (Fname, Lname, Enrol, Course, Sem, Psociety, Idescription, Padate, Portfolio) 
                VALUES ('$Fname', '$Lname', '$Enrol', '$Course', '$Sem', '$Psociety', '$Idescription', '$Padate', '$portfolioDestination')";
    
    $result = mysqli_query($con, $request);

    if ($result) {
        ob_start();
        header('Location: societies.php?message=success');
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