<?php
include "connection.php";

session_start();

if (!isset($_SESSION['Suname'])) {
    header('Location: login.html');
    exit();
}
$studentName = $_SESSION['Suname'];

$enrol = $_SESSION['Senrol'];

$sql_query_medical = "SELECT Fname,Lname, SubmissionDate FROM medical WHERE enrol='" . $enrol . "'";
$result_medical = mysqli_query($conn, $sql_query_medical);

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
            margin-bottom: 4rem;
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
            margin-top: 3rem;
            color: white;
            text-align: center;
            color: black;
            font-weight: 900;
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
            <h1>Complaint & Application Tracking</h1>
            <p>Our application tracking feature is designed to keep you informed and engaged throughout your application process. <br>As a student, you now have the ability to track the status of your submitted applications effortlessly.</p>
            <p>Stay connected, stay informed. Embrace the power of tracking your medical applications and ragging complaints effortlessly. <br> Your journey is important to us, and with our tracking feature, you're in control every step of the way.</p>
        </section>
    <footer>
        <p>Copyright &#169 2023 Student HelpDesk. All Rights Reserved</p>
    </footer>
</body>

</html>