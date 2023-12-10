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
    <title>Document</title>
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

        /*TRANSITIONS*/
        a, .btn {
            transition: all 300ms ease;

        }
        h1 {
            font-size: 3rem;
            margin-top: 6rem;
            text-align: center;
        }
        h2 {
            font-size: 1.5rem;
            text-align: center;
            color: rgb(234, 255, 0);
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
        .Announcement_details {
            border: 2px solid rgb(234, 255, 0);
            padding: 5rem;
            margin: 0 auto;
            width: 65%;
            margin: 2rem auto;
            border-radius: 10px;
            transition: border-color 0.3s ease;
        }

        .Announcement_details:hover {
            
            border-color: red;
            background-color: #FAFAFA;
        }

        h3 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
        }

        p {
            color: #666;
            margin-top: 10px;
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
    <div class="title">
        <h1>Updates & Notifications</h1>
        <h2>Via. Student HelpDesk</h2>
    </div>
    <div class="Announcement_details">
            <?php
                include "retrieve_announcement.php";

                if (isset($_GET['id'])) {
                    $announcementID = $_GET['id'];

                    // Fetch the details of the selected announcement
                    $sql = "SELECT * FROM announcements WHERE Id = $announcementID";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $announcementTitle = $row["Title"];
                        $announcementDescription = $row["Description"];
                        $postingDate = $row["Created"];

                        // Display the details
                        echo "<h3>$announcementTitle</h3>";
                        echo "<p><strong>Posting Date:</strong> $postingDate</p>";
                        echo "<p>$announcementDescription</p>";
                    } else {
                        echo "Announcement not found.";
                    }
                } else {
                    echo "Invalid request.";
                }

                ?>
    </div>
</body>
</html>