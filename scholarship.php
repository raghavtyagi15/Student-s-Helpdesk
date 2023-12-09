<?php
        include('sessioncheck.php'); // file with the check_authentication function
        check_authentication(); // function to check if the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scholarship Eligibility</title>
  <style>

    /*OVER-ALL BODY*/

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

    /* NAV-BAR */

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
    
    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }
    
    label {
        display: block;
        margin-bottom: 8px;
    }
    
    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
    }
    
    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    button:hover {
        background-color: #45a049;
    }

    /*SCHOLARSHIP SECTION*/

    #Scholarships {
        text-align: center;
        padding: 4.5rem;
    }

    .scholarships-title h1{
        color: #000000; 
        font-size: 2.5rem;
        text-align: center;
    }

    .scholarships-Sub-title h2 {
        color: rgb(234, 255, 0); 
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        text-align: center;

    }

    #corner-container {
    padding-top: 0rem;
    width: 78vw;
    margin: 0 auto; 
    margin-bottom: 5rem;
    background-color: #ffffff;
    text-align: center; 
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

    /*FORM-CONTAINER*/

    form {
        padding-bottom: 1.5rem;
    }

    .form-container textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #fff; 
        color: #333; 
        font-weight: 600;
        border: 1px solid #ddd; 
        border-radius: 5px;
    }

    .form-container label {
        color: #333; 
        display: block;
        margin-bottom: 5px;
    }

    .form-container input[type="text"],
    .form-container input[type="number"],
    .form-container input[type="date"],
    .form-container input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #fff; 
        color: #333; 
        font-weight: 600;
        border: 1px solid #ddd; 
        border-radius: 5px;
    }

    .form-container input[type="checkbox"] {
        margin-right: 5px;
        transform: scale(1.3); 
    }
    
    .form-container input[type="checkbox"]:hover {
        filter: brightness(1.5); 
        cursor: pointer; 
    }

    .form-container input[type="file"] {
        border: none;
    }

    .button-container input[type="submit"] {
        background-color: rgb(234, 255, 0); 
        color: #000;
        margin-top: 1.5rem;
        padding: 1rem;
        border: none;
        
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 300ms ease;
    }

    .button-container input[type="submit"]:hover {
        background-color: #FF1C04; 
    }

    /*ARTICLE CONTAINER*/

    article {
        width: 75vw;
        height: 35vh;
        margin: 4rem auto; 
        text-align: center;
        transition: transform 0.3s ease-in-out;
        border: 2px solid #ddd;
        padding: 3.5rem; 
        border-radius: 25px;
        font-weight: 400;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    article:hover {
        background-color: rgba(234, 255, 0, 0.03); 
        border: 1px solid rgb(234, 255, 0);
        transform: scale(1.1);
    }
    .scholarship-article h2 {
        margin-bottom: 1rem;
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
    <section id="Scholarships">
        <div class="scholarships-title">
            <h1>Our Scholarships</h1>
            <div class="scholarships-Sub-title">
                <h2>Scholarships & Financial Aid Programs</h2>
            </div>
        </div>
        <div class="scholarship-type-container">
            <div class="scholarship-container">
                <article class="scholarship-article">
                    <h2>EmpowerED: College Scholarship Scheme for Academic Excellence and Financial Need</h2>
                    <div class="article-text-container">
                        <p>A transformative initiative designed to empower and support exceptional students in their pursuit of higher education. This scholarship program is dedicated to identifying and assisting individuals whose academic prowess shines with a grade exceeding 90% while considering the financial landscape of their families, with an annual income falling below 2.5 lakh.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </div>
    </section>
    <section id="corner-container">
        <div class="corner-title-container">
            <h1>Scholarship Eligibility </h1>
            <div class="corner-subtitle-container">
                <h2>Quickly check eligibility Via. Student's HelpDesk</h2>
                <div class="corner-text-container">
                    <p>Quickly check eligibility criteria and empower students to pursue their academic aspirations seamlessly.</p>
                <div class="form-container">
                    <form onsubmit="return checkEligibility()">
                        <input type="text" placeholder="First Name" id="Fname" required>
                        <input type="text" placeholder="Last Name" id="Lname" required>
                        <input type="text" placeholder="Enrollment Number" name="enrol" pattern="[0-9]{10}" required>
                        <input type="text" placeholder="Mobile Number" name="phone" pattern="[0-9]{10}" required>
                        <input type="number" placeholder="Grade" name="grade" required>
                        <input type="number" placeholder="Annual Income" name="annualIncome" required>
                        <div class="button-container">
                            <input type="submit" value="Check Eligibility" class="btn" name="send">
                        </div>
                        <div id="result"></div>
                    </form>
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
  <script src="javasc.js"></script>
</body>
</html>