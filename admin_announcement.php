<?php
include "functions.php";

if (!isLoggedIn()) {
    header("Location: admin_login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
                /* GENERAL */
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        *{
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: rgb(45, 45, 45);
            
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
            background-color: rgb(0, 0, 0);
            color: rgb(255, 255, 255);
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
            color: rgb(234, 255, 0);
            text-decoration: none;
            text-decoration-color: white;
            font-weight: 500;
            font-weight: 600;

        }

        a:hover {
            color: rgb(255, 255, 255);
            text-decoration: underline;
            text-underline-offset: 1rem;
            text-decoration-color: rgb(255, 255, 255);
        }

        .logo {
            font-size: 2rem;
            left: 0;
            color: rgb(234, 255, 0);
            font-weight: 600;

        }

        .logo:hover {
            cursor: default;
            transform: scale(1.1);

        }
        /*drop down menu*/

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgb(255, 255, 255);
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(216, 216, 25, 0.2);
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

        #Announcements {
            text-align: center;
            padding: 5rem;
        }


        .form-container {
            text-align: center; /* Center align the content within the container */
        }

        .form-container input[type="text"] {
            width: 50%;
            display: block;
            padding: 10px;
            margin: 0rem auto; /* Center the input horizontally */
            margin-bottom: 10px;
            background-color: black;
            color: white;
            font-weight: 600;
            border: 1px solid #ddd;
            border-radius: 5px;
            
        }
        .button-container input[type="submit"] {
            background-color: rgb(234, 255, 0); /* Green color */
            color: black;
            margin-top: 1.5rem;
            padding: 1rem;
            font-size: 0.9rem;
            border: none;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 300ms ease;
            width: 51.5%;
        }

        .button-container input[type="submit"]:hover {
            background-color: #FF1C04; /* Red color */
            color: white;
            
        }
        .Ann-container {
            height: 25vh;

            text-wrap: wrap;
        }
        .title-container h1 {
            font-size: 4rem;
            color: white;
        }
    </style>
</head>
<body>
    <nav id="desktop-nav">
        <div class="logo">Admin's Dashboard</div>
        <div>
            <ul class="nav-links">
                <li class="dropdown">
                    <a href="manage_students.php" class="dropbtn">Students</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Complaints</a>
                    <div class="dropdown-content">
                        <a href="admin_ragging.php">Ragging</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Applications</a>
                    <div class="dropdown-content">
                        <a href="admin_sports.php">Sports</a>
                        <a href="admin_societies.php">Societies</a>
                        <a href="admin_medical.php">Medical</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Announcements</a>
                    <div class="dropdown-content">
                        <a href="admin_announcement.php">Add Announcements</a>
                        <a href="manage_announcements.php">Manage Announcements</a>
                    </div>
                </li>
                <a href="admin_logout.php" class="dropbtn">Log-out</a>
            </ul>
        </div>
    </nav>
    <section id="Announcements">
        <div class="title-container">
            <h1>Announcements</h1>
            <div class="form-container">
                <form action="make_announcement.php" method="post" enctype="multipart/form-data">
                    <?php
                        // Check if a success message is present in the URL
                        if (isset($_GET['message']) && $_GET['message'] === 'success') {
                            echo '<p style="color: green; margin-left:4rem; font-weight:600; margin-bottom: 2rem; text-align:center; ">Announcement Added Successfully!</p>';
                        }
                    ?>  
                    <input type="text" placeholder="Add Title " name="Title" required>
                    <input type="text" placeholder="Add an Announcement " name="Description" class="Ann-container" required>
                    <div class="button-container">
                        <input type="submit" value="Submit" class="btn" name="send">
                   </div> 
                </form>
            </div>
        </div>

        
    </section>
</body>
</html>