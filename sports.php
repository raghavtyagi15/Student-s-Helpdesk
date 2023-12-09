<?php
        include('sessioncheck.php'); //  file with the check_authentication function
        check_authentication(); // function to check if the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Engagement</title>
    <style>
        /* GENERAL */
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
        form {
            padding-bottom: 4rem;
            align-items: center;
            margin-right: 6rem;
        }

        .form-container textarea {
            width: 50vw;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff; 
            color: #333; 
            font-weight: 600;
            border: 1px solid #ddd; 
            border-radius: 5px;
            margin-left: 4rem;
        }

        .form-container label {
            color: #333; 
            display: block;
            margin-bottom: 5px;
            margin-left: 4rem;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="date"],
        .form-container input[type="file"] {
            width: 50vw;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff; 
            color: #333; 
            font-weight: 600;
            border: 1px solid #ddd; 
            border-radius: 5px;
            margin-left: 4rem;
            
        }
        
        .form-container input[type="checkbox"] {
            margin-right: 5px;
            transform: scale(1.3); 
            margin-left: 4rem;
        }
        
        .form-container input[type="checkbox"]:hover {
            filter: brightness(1.5); 
            cursor: pointer; 
        }

        .form-container input[type="file"] {
            border: none;
            margin-left: 4rem;
        }

        .button-container input[type="submit"] {
            background-color: rgb(234, 255, 0); 
            color: #000;
            margin-top: 0.7rem;
            padding: 1rem;
            border: none;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 300ms ease;
            margin-left: 4rem;
        }

        .button-container input[type="submit"]:hover {
            background-color: #FF1C04; 
        }

        .form-container h1 {
            color: #000000; 
            font-size: 2.5rem;
            margin-bottom: 0.2rem;
            text-align: center;
            margin-top: 3rem;
        }

        .form-container h2 {
            color: rgb(234, 255, 0); 
            font-size: 1.5rem;
            
            margin-bottom: 2rem;
            text-align: center;
        }
        #sports-container {
            display: flex;
        }

        .Sports-article {
            flex: 1;
            padding: 20px;
            
            

        }
        article {
            width: 25vw;
            align-items: center;
            height: 25vh;
            white-space: wrap; 
            margin-top: 4rem;
            padding-top: 1.5rem;
            margin-left: 6rem;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            border: 2px solid #ddd;
            border-radius: 20px;
            font-weight: 500;
            display: flex; 
            flex-direction: column; 
        }

        article:hover {
            background-color: #ffffff;
            border: 1px solid rgb(234, 255, 0);
            transform: scale(1.1);
        }
        .icon {
            width: 4rem;
            height: 4rem;     
        }
        .form-container input[type="text"]:hover,
        .form-container input[type="number"]:hover,
        .form-container input[type="date"]:hover,
        .form-container input[type="file"]:hover,
        .form-container textarea:hover {
            border-color: rgb(234, 255, 0);
        }

        .form-container {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<nav id="desktop-nav">
        <div class="logo">Student's HelpDesk</div>
        <div>
            <ul class="nav-links">
                <li><a href="indexlogin.php'">Home</a></li>
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
    <section id="sports-container">
        <div class="Sports-article">
            <article>
                <h2>Cricket</h2>
                <img src="./assets/cricket.png" alt="Cricket Sports" class="icon">
                <p>Bat, Bowl, Bond <br> Where Cricket Spirits Soar.</p>
            </article>
            <article>
                <h2>Basket Ball</h2>
                <img src="./assets/basketball.png" alt="Basketball Sports " class="icon">
                <p>Dribble to Victory <br> Soar with Every Slam</p>
            </article>
            <article>
                <h2>Rugby</h2>
                <img src="./assets/rugby.png" alt="Rugby Sports" class="icon">
                <p>Rumble on the Field, <br> Roar in Unity</p>
            </article>
        </div>
        <div class="form-container">
            <div class="form-title">
                <h1>Engage in Sports Activities</h1>
                <div class="form-subtitle">
                    <h2>Via. Student's HelpDesk</h2>
                </div>
            </div>
            <form action="Sports_insert.php" method="post" enctype="multipart/form-data">
                <?php
                    // if success message is present in the URL Prints successful form submission
                    if (isset($_GET['message']) && $_GET['message'] === 'success') {
                        echo '<p style="color: green; margin-left:4rem; margin-bottom: 2rem; font-weight:600; text-align:center; ">Your request has been submitted successfully!</p>';
                    }
                ?>    
                <input type="text" placeholder="First Name " name="Fname" required>
                <input type="text" placeholder="Last Name " name="Lname" required>
                <input type="text" placeholder="Enrolment Number " name="Enrol" pattern="[0-9]{10}"required>
                <input type="text" placeholder="Course " name="Course" required>
                <input type="number" placeholder="Semester " name="Sem" required>
                <input type="text" placeholder="Prefered Sports" name="Psports" required>  
                <textarea name="Intro" rows="5" cols="5">Describe yourself, your Passion & Achievements</textarea>
                <label for="Tdate">Prefered Trial Date:</label>
                <input type="date" id="start" name="Tdate">
                <label for="Ypicture" class="custom-file-input">Upload your Picture :</label>
                <input type="file" id="Ypicture" name="Ypicture" accept="image/*">
                <div class="button-container">
                    <input type="submit" value="Submit" class="btn" name="send">
                </div>  
                
            </form>
        </div>
    </section>
</body>
</html>