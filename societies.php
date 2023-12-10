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
    <title>College Societies</title>
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
            color: rgb(85, 85, 85);
        }
        /*TRANSITIONS*/
        a, .btn {
            transition: all 300ms ease;
        }
        /* NAV */
        nav, .nav-links {
            display: flex;
            background-color: rgb(255, 255, 255);
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
        #society {
            background-color: rgb(234, 255, 0);
            padding: 5rem 4rem;
            text-align: center;
            color: #000; 
        }

        .society-title-container h1 {
            color: #000000; 
            font-size: 2.5rem;
            margin-bottom: 0rem;
            text-align: center;;
        }


        .society-subtitle-container h2{
            margin-bottom: 20px;
            color: rgb(0, 0, 0);
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }


        .society-text-container p {
            color: #797979; 
            margin-bottom: 2rem;
            text-align: center;
            display: flex;
            justify-content: center;
        }

        .article-container {
            justify-content: center;
            margin-top: 2.5rem;
            gap: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        article {
            background-color: #fff; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        article:hover {
            transform: scale(1.05);
        }

        article img {
            width: 7%;
            height: auto;
            border-bottom: 2px solid rgb(234, 255, 0);
        }

        article h2 {
            color: rgb(234, 255, 0);
            font-size: 2rem;
            margin-top: 1rem;
        }

        article p {
            padding: 20px;
            font-size: 1em;
            color: #737373;
            text-wrap: wrap; 
        }
        #corner-container {
            padding-top: 5rem;
            padding-left: 4.5rem;
            margin-bottom: 2rem;
            background-color: #ffffff;
            text-align: left;
        }

        .corner-title-container h1 {
            color: #000000;
            font-size: 2.5rem;
            margin-bottom: 0.2rem;
            text-align: center;
        }

        .corner-subtitle-container h2 {
            color: rgb(234, 255, 0); 
            font-size: 1.5rem;
            margin-bottom: 20px;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .corner-text-container p {
            color: #555; 
            margin-bottom: 2rem;
            text-align: center;
        }
        .link-form {
            color: blue;
            font-size: 1.5rem;
        }

        /*FORM STYLING*/

        form {
            padding-bottom: 4rem;
            align-items: center;
        }

        .form-container textarea {
            width: 80vw;
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
            width: 80vw;
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

        /*FOOTER SECTION*/

        footer {
            height: 9vh;
            margin: 0 1 rem;
            background-color: black;

        }

        footer p {
            text-align: center;
            padding-top: 1rem;
            color: rgb(255, 255, 255);
            font-weight: 600;
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
    <section id="society">
        <div class="society-title-container">
            <h1>Our Societies</h1>
            <div class="society-subtitle-container">
                <h2>Unleashing Creativity, Fostering Unity</h2>
                <div class="society-text-container">
                    <p>Express Yourself : Join the Canvas of Creativity in our Art, Drama, and Fashion Societies – Where Passion Takes Center Stage.</p>
                    <marquee behavior="" direction=""><a href="#corner-container" class="link-form">Fill out Audition Form Right Now!</a></marquee>
                </div>
            </div>
        </div>
        <div class="article-container">
            <article>
                <h2>Palette Pulse : Uniting Artistry with Every Stroke</h2>
                <img src="./assets/art.png" alt="Art-Society" class="icon">
                <p>Diverse talents converge to create a symphony of colors, forms, and emotions. Unleash your creativity, connect with like-minded enthusiasts, and let the canvas become a portal to boundless imagination.</p>
            </article>
            <article>
                <h2>ActMinds Ensemble</h2>
                <img src="./assets/drama.png" alt="Drama-Society" class="icon">
                <p>Where stories come alive on stage. Join us in exploring the art of expression, connecting through compelling narratives, and creating unforgettable moments under the spotlight.</p>
            </article>
            <article>
                <h2>Desi Drapes</h2>
                <img src="./assets/fashion.png" alt="Fashion-Society" class="icon">
                <p>Where every fold tells a story of tradition and every thread weaves a tale of cultural splendor. Join us in the vibrant fabric of Indian fashion, embracing the timeless allure of ethnic elegance and contemporary charm.</p>
            </article>
        </div>
    </section>
    <section id="corner-container">
        <div class="corner-title-container">
            <h1>Join Our College Societies</h1>
            <div class="corner-subtitle-container">
                <h2>Via. Student HelpDesk</h2>
                <div class="corner-text-container">
                    <p>Apply and thrive in communities that align with your passions, shaping a vibrant and enriching college experience.</p>
                    <div class="form-container">
                        <form action="Society_insert.php" method="post" enctype="multipart/form-data">
                        <?php
                            // if success message is present in the URL Prints message
                            if (isset($_GET['message']) && $_GET['message'] === 'success') {
                                echo '<p style="color: green; margin-left:4rem; margin-bottom: 2rem; font-weight:600; text-align:center; ">Your request has been submitted successfully!</p>';
                            }
                            ?>   
                            <input type="text" placeholder="First Name " name="Fname" required>
                            <input type="text" placeholder="Last Name " name="Lname" required>
                            <input type="text" placeholder="Enrolment Number " name="Enrol" pattern="[0-9]{10}"required>

                            <input type="text" placeholder="Course " name="Course" required>
                            <input type="number" placeholder="Semester " name="Sem" required>
                            <input type="text" placeholder="Society Preference " name="Psociety" required>
                                
                            <textarea name="Idescription" rows="5" cols="5">Describe yourself, your Passion & Achievements</textarea>
                            <label for="date">Prefered Audition Dates:</label>
                            <input type="date" id="Padate" name="Padate">
                            <label for="Proof" class="custom-file-input">Upload your Picture / Portfolio :</label>
                            <input type="file" id="Portfolio" name="Portfolio" accept="image/*">
                            <div class="button-container">
                                 <input type="submit" value="Submit" class="btn" name="send">
                            </div>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>Copyright &#169 2023 Raghav Tyagi. All Rights Reserved</p>
    </footer>
    
</body>
</html>