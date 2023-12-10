<?php
include "student_function.php"; 

if (!SLoggedIn()) {
    header("Location: index.html");
    exit();
}

$studentName = $_SESSION['Suname'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
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
            color: rgb(234, 255, 3);
        }

        #Announcements {
            padding: 5rem;
            text-align: center;
        }

        h1 {
            font-size: 5rem;
        }
        table {
            width: 100%;
            margin-top: 3rem;
            border-collapse: collapse;
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
        #ragging-complaints {
            text-align: center;
            padding: 3rem;
        }


        .ann-container {
            margin-top: 30px;
            background-color: #f2f9ff; /* Light blue background color */
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }

        .ann-container a {
            text-decoration: none;
            color: #007bff; /* Blue link color */
            display: block;
            
        }
        h1 {
            font-size: 3rem;
            margin-top: 4rem;
            text-align: center;
        }
        h2 {
            font-size: 1.5rem;
            text-align: center;
            color: rgb(234, 255, 0);
        }
        p {
            font-weight: 500;
            color: gray;
            margin: 0.5rem auto;
        }

        /*User Information*/
        .greeting {
            position: fixed;
            top: 140px;
            right: 10px;
            background-color: #930000;
            color: rgb(255, 255, 255);
            padding: 6px;
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
    <div class="greeting">
        <p>Hello, <?php echo $studentName; ?>!</p>
    </div>
    <section id="Announcements">
        <div class="announcement-container">
            <h1>Updates & Notifications</h1>
            <h2>Via. Student's HelpDesk</h2>
            <p>Empowering students with instant updates! <br>Our notification feature keeps college students in the loop, delivering timely information to enrich your academic journey effortlessly.</p>
            <div class="ann-container">
            <?php
                include "retrieve_announcement.php";
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $announcementID = $row["Id"];
                        $announcementTitle = $row["Title"];
                        echo '<marquee> <a href="announcement_details.php?id=' . $announcementID . '">';
                        echo $announcementTitle;
                        echo '</a></marquee> <br>'; // Add a line break after each link
                    }
                } else {
                    echo "0 results";
                }
            ?>
            </div>
        </div>
    </section>
</body>
</html>