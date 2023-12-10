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
            background-color: rgb(33, 33, 33);
            
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
        #Home {
            display: flex;
            justify-content: center;
            gap: 5rem;
            height: 60vh;
            padding-top: 75px;
        
        }

        .section__pic-container {
            display: flex;
            height: 400px;
            width: 400px;
            margin: auto o;
            transition: transform 0.3s ease-in-out;
            filter: drop-shadow(0 0 30px #565656);
            
        }

        .section__pic-container:hover {
            transform: scale(1.1);

        }

        .section__text {
            align-self: center;
            text-align: center;
        }

        .section__text p {
            font-weight: 600;

        }

        .section__text h1 {
            font-size: 5rem;
            color: white;
        }
        .section__text__p1 {
            text-align: center;
            font-size: 2.5rem;
            color: lightcyan;
        }

        .section__text__p2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: lightcyan;
        }

        .title {
            font-size: 3rem;
            text-align: center;
        }

        /*FOOTER*/

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
    <section id="Home">
        <div class="section__pic-container">
            <img src="./assets/HelpDesk.png" alt="Helpdesk System Picture">
        </div>
        <div class="section__text">
            <p class="section__text__p1">STUDENT'S</p>
            <h1 class="title">HelpDesk System</h1>
            <p class="section__text__p2">At your Help anytime!</p>
        </div>
    </section>
</body>
</html>