<?php
include "student_function.php"; 

if (!SLoggedIn()) {
    header("Location: index.html");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        *{
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            
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
        /* NAV */
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
        a:hover {
            color: rgb(48, 3, 3);
            text-decoration: underline;
            text-underline-offset: 1rem;
            text-decoration-color: rgb(255, 255, 255);
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
            color: black;
        }

        .dropdown-content a:hover {
            color: rgb(234, 255, 0);
            
        }
        #timetable {
            background-color: #ffffff;
            padding: 5rem;
            text-align: center;
        }

        .title-container h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 10px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid rgb(234, 255, 0);
            font-weight: 600;
        }

        th {
            background-color: rgb(234, 255, 0);
            color: rgb(0, 0, 0);
        }

        td {
            background-color: #ffffff;
        }
        .btn {
            background-color: rgb(98, 255, 0); 
            color: rgb(0, 0, 0);
            padding: 10px 20px;
            border: none;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 300ms ease;
        }

        .btn:hover {
            background-color: rgb(247, 28, 4);

        }
        .btn-container {
            margin-top: 10px;
        }

        .marquee-note-text-container marquee {
            color: #555;
            font-size: 1rem;
            margin-top: 2rem;
        }
        .title-container h1 {
            font-size: 2.5rem;
            color: black;
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
                <li><a href="logout.php">Log-out</a></li>
            </ul>
        </div>
    </nav>
    <section id="timetable">
        <div class="title-container">
            <h1>Time Table</h1>
            <div class="timetable-box">
                <table border="1">
                    <tr>
                        <th>Year / Course</th>
                        <th>BCA</th>
                        <th>BBA</th>
                        <th>B.COM</th>
                    </tr>
                    <tr>
                        <td>Year - 1</td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-color-2" 
                                onclick="window.open('./assets/Bcatimetable.pdf')">
                                Click to Download
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-color-2" 
                                onclick="window.open('./assets/Bcatimetable.pdf')">
                                Click to Download
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-color-2" 
                                onclick="window.open('./assets/Bcatimetable.pdf')">
                                Click to Download
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Year - 2</td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-color-2" 
                                onclick="window.open('./assets/Bcatimetable.pdf')">
                                Click to Download
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-color-2" 
                                onclick="window.open('./assets/Bcatimetable.pdf')">
                                Click to Download
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-color-2" 
                                onclick="window.open('./assets/Bcatimetable.pdf')">
                                Click to Download
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Year - 3</td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-color-2" 
                                onclick="window.open('./assets/Bcatimetable.pdf')">
                                Click to Download
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-color-2" 
                                onclick="window.open('./assets/Bcatimetable.pdf')">
                                Click to Download
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-color-2" 
                                onclick="window.open('./assets/Bcatimetable.pdf')">
                                Click to Download
                                </button>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="marquee-note-text-container">
                    <marquee behavior="scroll" direction="left" class="marquee">
                        Note - Any change in the time table, can be notified in the Announcement section by Course Coordinator
                    </marquee>
                </div>
            </div>
        </div>
    </section>
</body>
</html>