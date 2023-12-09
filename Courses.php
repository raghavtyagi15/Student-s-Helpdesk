<?php
        include('sessioncheck.php'); // file with the check_authentication function
        check_authentication(); //function to check if the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        #Academics {
            padding: 7vh;
        }

        .Academics-title h1 {
            font-size: 2rem;
            line-height: 1.5rem; 
            text-align: center;
        }

        .Academics-title h2 {
            font-size: 1.5rem;
            text-align: center;
        }

        .Course-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            align-items: center;
            margin: 1.5rem;
        }


        article {
            width: 70vw;
            row-gap: 3rem;
            height: 35vh;
            text-wrap: wrap;
            margin-bottom: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            border: 2px solid #ddd;
            padding: 5rem;
            border-radius: 20px;
            font-weight: 500;
            align-items: center;
            
        }

        article:hover {
            background-color: #ffffff; 
            border: 1px solid rgb(234, 255, 0);
            transform: scale(1.1);
        }

        .icon {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
        footer {
            height: 26vh;
            margin: 0 1 rem;
            background-color: black;

        }

        footer p {
            text-align: center;
            padding-top: 1rem;
            color: rgb(255, 255, 255);
            font-weight: 600;
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
    <section id="Academics">
            <div class="Academics-title">
                <h1>ACADEMICS</h1>
                <div class="Academics-Sub-title">
                    <h2>Our Courses</h2>
                </div>
            </div>
            <div class="Academics-course-container">
                <div class="Course-container">
                    <article>
                        <h2>BCA</h2>
                        <img src="./assets/bca.png" alt="Computer Applications" class="icon">
                        <div class="article-text-container">
                            <p>BCA program stands at the forefront, preparing students for the dynamic world of IT. Throughout the course, you will delve into diverse subjects, from programming languages to database management, ensuring a holistic understanding of the field.
                                Our experienced faculty, state-of-the-art labs, and industry-relevant curriculum create an environment where theoretical knowledge seamlessly integrates with practical applications. As a BCA student, you'll have the opportunity to engage in real-world projects, internships, and stay abreast of the latest technological trends.
                            </p>
                        </div>
                    </article>
                    <article>
                        <h2>BBA</h2>
                        <img src="./assets/bba.png" alt="Business Administration" class="icon">
                        <div class="article-text-container">
                            <p>Our BBA course is tailored to shape aspiring business leaders by providing a comprehensive understanding of business principles, management strategies, and entrepreneurial skills.
                                In the ever-evolving global business landscape, our BBA program stands as a beacon for those who aspire to lead with vision and innovation. Throughout the course, students delve into diverse subjects such as marketing, finance, human resources, and strategic management, preparing them for the challenges and opportunities of the corporate world.
                            </p>
                        </div>
                    </article>
                    <article>
                        <h2>B.Com</h2>
                        <img src="./assets/comm.png" alt="Commerce" class="icon">
                        <div class="article-text-container">
                            <p>Our B.Com course is crafted to provide students with a robust foundation in finance, accounting, and business, offering a pathway to a diverse array of career opportunities.
                                In the dynamic world of commerce, our program stands out as a platform for aspiring professionals seeking expertise in financial management, taxation, and business analytics. Throughout the B.Com journey, students engage with a comprehensive curriculum that blends theoretical knowledge with practical applications, ensuring a well-rounded understanding of the field.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <nav>
            <div class="nav-links-container">
                <ul class="nav-links">
                    <li><a>Student's HelpDesk System</a></li>
                </ul> 
            </div>
        </nav>
        <p>Copyright &#169 2023 Raghav Tyagi. All Rights Reserved</p>
    </footer>
</body>
</html>