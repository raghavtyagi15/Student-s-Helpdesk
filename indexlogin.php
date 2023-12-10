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
    <link rel="stylesheet" href="stylesheet.css">
    <title>Document</title>
    
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
    <div class="greeting">
        <p>Hello, <?php echo $studentName; ?>!</p>
    </div>
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
    <section id="About">
        <h1 class="title">About the System</h1>
        <div class="section-container">
                <div class="text-container">
                    <p>The student helpdesk system serves as a vital support system within educational institutions, providing a centralized platform for students to seek assistance and information. This system is designed to streamline communication and address various needs, ranging from academic queries to technical issues.  </p>
                    <div class="about-pic">
                        <img src="./assets/about-pic.jpg" alt="about Picture">
                    </div>
                </div> 
            </div>     
        </div>
    </section>
    <section id="Corner">
        <h1 class="title">Our Features</h1>
        <div id="corner-details-container">
            <h2 class="Corner-Sub-title">Student's Corner</h2>
            <div class="features-container">
                <div id="article-container">
                    <article>
                        <img src="./assets/Medical-application.png" alt="Medical Application" class="icon">
                            <h3>Hassle-Free Medical Application</h3>
                            <p>Ensuring effortless submission of medical certificates for a seamless and efficient leave request process.</p>
                            </div>
                    </article>
                    <article>
                        <img src="./assets/Ragging-bully.png" alt="Anti-Ragging" class="icon">
                         <h3> Swift Ragging Complaints</h3>
                        <p>Swiftly address any ragging complaints with our responsive system, prioritizing student well-being and fostering a safe educational environment.</p>
                    </article>
                    <article>
                            <img src="./assets/Scholarship-eligibility.png" alt="Scholarship Eligibility" class="icon">
                            <h3>Scholarship Eligibility</h3>
                            <p>Quickly check eligibility criteria and empower students to pursue their academic aspirations seamlessly.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section id="Enrichment">
        
        <h1 class="title">Our Features</h1>
        <div id="corner-details-container">
            <h2 class="Corner-Sub-title">Student's Enrichment</h2>
            <div class="features-container">
                
                <div id="article-container">
                    <article>
                        <img src="./assets/societies.png" alt="Medical Application" class="icon">
                            <h3>College Socities</h3>
                            <p>Dive into a world of opportunities with our College Societies feature. Apply and thrive in communities that align with your passions, shaping a vibrant and enriching college experience.</p>
                            </div>
                    </article>
                    <article>
                            <img src="./assets/sports.png" alt="Scholarship Eligibility" class="icon">
                            <h3>Sports Engagement</h3>
                            <p>Fuel your passion for sports with our dynamic Sports Engagement feature. Apply now to join thrilling teams, foster teamwork, and elevate your campus experience through the exhilaration of athletic pursuits.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <h1 class="contact-title">Contact Us</h1>
        <p class="contact-intro">
            Get in Touch with the Developers
        </p>
        <div class="contact-info-upper-container">
            <div class="contact-info-container">
                <img src="./assets/email.png" alt="email icon" class="icon contact-icon email-icon"/>
                <p><a href="mailto:theraghavtyagi15@gmail.com">Theraghavtyagi15@gmail.com</a></p>

            </div>
            <div class="contact-info-container">
                <img src="./assets/linkedin.png" alt="linkedin icon" class="icon contact-icon"/>
                <p><a href="https://www.linkedin.com">Raghav Tyagi</a></p>

            </div>
        </div>
    </section>
    <footer>
        <nav>
            <div class="nav-links-container">
                <ul class="nav-links">
                    <li><a href="#About">About</a></li>
                    <li><a href="Academics.html">Academics</a></li>
                    <li><a href="#Corner">Student's Corner</a></li>
                    <li><a href="#Enrichment">Enrichment</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="login.html" >Log-in</a></li>
                </ul> 
            </div>
        </nav>
        <p>Copyright &#169 2023 Student HelpDesk. All Rights Reserved</p>
    </footer>
</body>
</html>