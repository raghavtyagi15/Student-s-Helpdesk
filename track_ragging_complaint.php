<?php
include "connection.php";

session_start();

if (!isset($_SESSION['Suname'])) {
    header('Location: login.html');
    exit();
}
$studentName = $_SESSION['Suname'];

$enrol = $_SESSION['Senrol'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Tracking</title>
    <style>
        /* GENERAL */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        *{
            margin: 0;
            padding: 0;
        }
        /*SECTION*/
        section {
            padding-top: 4vh;
            height: 96vh;
            margin: 0 10rem;
            box-sizing: border-box;
            min-height: fit-content;

        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: rgb(255, 255, 255);
        }
        html {
            scroll-behavior: smooth;
        }
        p {
            color: rgb(85, 85, 85
            );
        }

        /*TRANSITIONS*/
        a, .btn {
            transition: all 300ms ease;
        }

        /*NAV*/
        nav, .nav-links {
            display: flex;
            background-color: rgb(234, 255, 0);
            color: white;
        }
        nav {
            justify-content: space-around;
            align-items: center;
            height: 17vh;
        }
        .nav-links {
            gap: 2rem;
            list-style: none;
            font-size: 1.5rem;
            align-items: center;
            vertical-align: middle;
        }
        a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            text-decoration-color: white;
            font-weight: 500;
            font-weight: 600;
        }
        .login-link {
            color: rgb(17, 0, 128); /* Your desired color */
            font-weight: bold; /* Your desired font weight */
            /* Add any other styles as needed */
        }

        a:hover {
            color: rgb(48, 3, 3);
            text-decoration: underline;
            text-underline-offset: 1rem;
            text-decoration-color: rgb(255, 255, 255);
        }
        /*DROP-DOWN MENU*/
        .dropdown {
            position: relative;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgb(255, 255, 255);
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown:hover .dropdown-content {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
        }
        .dropdown-content a {
            color: rgb(0, 0, 0);
        }
        .dropdown-content a:hover {
            color: rgb(234, 255, 0);
        }
        .logo {
            font-size: 2rem;
            left: 0;
            color: black;
            font-weight: 600;
        }
        .logo:hover {
            cursor: default;
            transform: scale(1.1);
        }
        #ragging-complaints {
            margin: 1rem auto;
            padding: 4rem 5rem;
            
        }

        .welcome-message {
            text-align: center;
            margin-bottom: 15px;
        }

        .title-container {
            text-align: center;
            margin-bottom: 0;
            
        }

        h1, h2 {
            font-size: 3rem;
            color: white;
            text-align: center;
            color: black;
            font-weight: 900;
        }

        .data-container {
            margin: 20px auto; /* Center the container */
            background-color: white; /* Set the background color */
            padding: 20px; /* Add padding for better spacing */
            margin: auto;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
            height: 30%;

        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid darkgray;
            font-weight: 600;
        }

        th {
            background-color: rgb(234, 255, 0);
            color: rgb(0, 0, 0);
        }

        td {
            background-color: white;
            color: black;
        }
        p {
            font-size: 1rem;
            font-weight: 500;
            color: gray;
            text-align: center;
            margin-bottom: 0.5rem;
            
        }
        /*USER INFORMATION RIBBON*/
        .greeting {
            position: fixed;
            top: 136px; 
            right: 10px;
            background-color: #930000;
            color: rgb(255, 255, 255);
            padding: 8px;
            padding-bottom: 4px;
            border-radius: 0 0 5px 5px; 
            font-size: 600;
            box-shadow: 0px 4px 8px rgba(112, 112, 112, 0.1);
            transition: background-color 0.3s ease;
            z-index: 1000; 
        }
        .greeting p {
            font-weight: 600;
            color: white;
        }
        .greeting:hover {
            background-color: rgb(234, 255, 0);
        }
        .medical-card {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid rgb(234, 255, 0);
            background: lavender;
            transition: transform 0.3s ease; 
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 9rem;
        }
        .medical-card:hover {
            transform: scale(1.04); /* Increase the scale factor as needed */
    
        }
        .data-container {
            margin: 40px;
        }

        .applications-table {
            width: 40%;
            border-collapse: collapse;
        }

        .applications-table th, .applications-table td {
            border: 1px solid #ddd;
            text-align: left;
        }


        .card-heading {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: whitesmoke;
        }

        .medical-logo {
            text-align: center;
            margin-bottom: 13px;
        }

        .medical-logo img {
            width: 50px;
            height: 50px;
        }

        .medical-card p {
            margin-bottom: 10px;
            color: black;
        }

        .medical-card p strong {
            font-weight: bold;
        }

        .medical-card p:last-child {
            margin-bottom: 0;
        }

        .medical-card p span {
            font-weight: 600;
        }
        .sub-nav {
            background-color: black;
            text-align: center;
        }

        .sub-nav-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            color: black;
            background-color: rgb(234, 255, 0);
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .sub-nav-button:hover {
            background-color: #ccc;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: black;
            text-align: center;
            font-weight: 600;
            padding: 1rem;
        }
        footer p {
            color: whitesmoke;
        }
    </style>
</head>
<body>
<nav id="desktop-nav">
        <div class="logo">Student's HelpDesk</div>
        <div>
            <ul class="nav-links">
                <li><a href="indexlogin.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Academics</a>
                    <div class="dropdown-content">
                        <a href="Courses.php">Our Courses</a>
                        <a href="timetable.php">Time Table</a>
                        <a href="announcement.php">Announcements</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Student's Corner</a>
                    <div class="dropdown-content">
                        <a href="medicalapp.php">Medical Application</a>
                        <a href="ragging.php">Ragging Complaint</a>
                        <a href="scholarship.php">Scholarship Eligibility</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Enrichment</a>
                    <div class="dropdown-content">
                        <a href="societies.php">Societies</a>
                        <a href="sports.php">Sports Engagement</a>
                    </div>
                </li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="sub-nav">
        <a href="track_medical_application.php" class="sub-nav-button">Medical Applications</a>
        <a href="track_ragging_complaint.php" class="sub-nav-button">Ragging Complaints</a>
    </div>
    <div class="greeting">
        <a href="track_application.php"><p>Hello, <?php echo $studentName; ?>!</p></a>
    </div>
    <section id="ragging-complaints">
        </div>
        <div class="title-container">
            <h1>Ragging Complain Tracking</h1>
            <p>Our application tracking feature is designed to keep you informed and engaged throughout your application process. <br>As a student, you now have the ability to track the status of your submitted applications effortlessly.</p>
        </div>
        <div class="data-container">
            <?php
                if(isset($_SESSION['Senrol'])) {
                    $enrol = $_SESSION['Senrol'];
                    $sql_query_ragging = "SELECT Id, Description, SubmissionDate FROM ragging WHERE enrol = '" . $enrol . "'";
                    $result_ragging = mysqli_query($conn, $sql_query_ragging);

                    echo '<table border="1">';
                    echo '<tr>
                            <th>Com. ID</th>
                            <th>Complaint Description</th>
                            <th>Submission Date</th>
                            <th>Action</th>
                          </tr>';
                    while ($row_ragging = mysqli_fetch_assoc($result_ragging)) {
                        echo '<tr>';
                        echo '<td>' . $row_ragging['Id'] . '</td>';

                        echo '<td>' . $row_ragging['Description'] . '</td>';
                        echo '<td>' . $row_ragging['SubmissionDate'] . '</td>';
                        echo '<td><a style="color: darkred" href="?comid=' . $row_ragging['Id'] . '">View Details</a></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            ?>
        </div>
        <div class="data-container">
            <?php
                if(isset($_GET['comid'])) {
                            $comid = $_GET['comid'];
                            $sql_query_details = "SELECT * FROM ragging WHERE Id = '" . $comid . "'";
                            $result_details = mysqli_query($conn, $sql_query_details);
                            while ($row_details = mysqli_fetch_assoc($result_details)) {
                                echo '<div class="medical-card">';
                                echo '<p class="card-heading">Ragging Complaint</p>';
                                echo '<div class="medical-logo"><img src="./assets/complaint_inffo.png" alt="Medical Logo"></div>';
                                echo '<p><strong>Complaint Id :</strong> ' . $row_details['Id'] . '</p>';
                                echo '<p><strong>Name :</strong> ' . $row_details['Fname'] . ' ' . $row_details['Lname'] . '</p>';
                                echo '<p><strong>Enrol :</strong> ' . $row_details['Enrol'] . '</p>';
                                echo '<p><strong>Course :</strong> ' . $row_details['Course'] . '</p>';
                                echo '<p><strong>Semester :</strong> ' . $row_details['Sem'] . '</p>';
                                echo '<p><strong>Reason :</strong> ' . $row_details['Description'] . '</p>';
                                echo '<p><strong>Incident Date :</strong> ' . $row_details['Idate'] . '</p>'; 
                                echo '<p><strong>Submission Date :</strong> ' . $row_details['SubmissionDate'] . '</p>'; 
                                $status = $row_details['Status'];
                                $color = ($status == 0) ? 'greenyellow' : 'red';
                                $text = ($status == 0) ? 'Addressed' : 'Pending';
                                echo '<p>Status : <span style="color: ' . $color . ';">' . $text . '</span></p>';


                            }
                }
            ?>
        </div>
    </section>
    <footer>
        <p>Copyright &#169 2023 Student HelpDesk. All Rights Reserved</p>
    </footer>
</body>
</html>