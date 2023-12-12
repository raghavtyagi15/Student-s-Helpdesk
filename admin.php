<?php
include "functions.php";

if (!isLoggedIn()) {
    header("Location: admin_login.html");
    exit();
}
?>
<?php
include "count.php";
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
            padding-top: 5rem;
            padding-bottom: 5rem;
        
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
            font-size: 4rem;
            color: white;
        }
        .section__text__p1 {
            text-align: center;
            font-size: 2rem;
            color: lightcyan;
        }

        .section__text__p2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: lightcyan;
        }

        .title {
            font-size: 2rem;
            text-align: center;
        }
        
        /*DASHBOARD-ARTICLES*/
        #Dashboard-container {
            display: flex;
            justify-content: space-around;
            margin-top: 4rem;
            padding: 3rem 3rem;
            gap: 2rem;
            margin-bottom: 10rem;
        }

        article {
            flex: 1;
            padding: 20px;
            text-align: center;
            border-radius: 20px;
            transition: transform 0.3s ease-in-out;
            overflow: hidden;
            position: relative;
            background-color: rgba(234, 255, 0, 0.1); /* Adjust the alpha value for transparency */
        }

        article:hover {
            transform: scale(1.05);
        }

        article img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 15%;
            margin-bottom: 15px;
            filter: invert(0) contrast(200%);
        }

        /* Unique colors for each box */
        article:nth-child(1) { background-color: rgba(234, 255, 0, 0); border: 2px solid rgb(255, 0, 0) }
        article:nth-child(2) { background-color: rgba(234, 255, 0, 0); border: 2px solid rgb(0, 255, 0) }
        article:nth-child(3) { background-color: rgba(234, 255, 0, 0); border: 2px solid rgb(0, 0, 255)}
        article:nth-child(4) { background-color: rgba(234, 255, 0, 0); border: 2px solid rgb(255, 219, 88)}

        p {
            margin: 0;
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
        }
        #contact {
            display: flex;
            justify-content: center;
            flex-direction: column;
            height: 60vh;
            margin-top: 30px;
            margin-bottom: 30px;

        }
        .contact-info-upper-container {
            display: flex;
            width: 48rem;
            height: 5rem;
            justify-content: center;
            border-radius: 2rem;
            border: rgb(53, 53, 53) 0.1rem solid;
            border-color: rgb(234, 255, 0);
            background: (250,250,250);
            margin: 2rem auto;
            padding: 0.5rem;
            transition: transform 0.3s ease-in-out;
        }
        .contact-info-upper-container:hover {
            transform: scale(1.1);
            color: white;
        }
        .contact-info-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 1rem;
        }
        .contact-title {
            font-size: 3rem;
            text-align: center;
            color: white;
        }
        .contact-intro {
            font-weight: 600;
            text-align: center;
            color: gray;
        }
        .contact-info-container p {
            font-size: larger;

        }
        .contact-icon {
            cursor: default;
            height: 3.3rem;
            width: 3.3rem;
        }
        .email-icon {
            height: 4rem;
            width: 4rem;
        }

        /*FOOTER SECTION*/
        footer {
            height: 26vh;
            margin: 0 1 rem;
            background-color: black;
        }
        footer p {
            text-align: center;
            background-color: rgb(234, 255, 0);
            font-weight: 600;
            color: black;
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
    <div>
        <h1 class="contact-title">Student's Engagement Hub</h1>
        <p class="contact-intro">Admin's Student Engagement Hub, a centralized control center where you can oversee and <br>manage student applications, feedback, registrations, and announcements.</p>
        </div>
    <section id="Dashboard-container">
        
        <article>
            <img src="./assets/student.png" alt="">
            <p>Students : <?php echo $rowStudents['studentCount']; ?></p>
        </article>
        <article>
            <img src="./assets/application.png" alt="">
            <p>Applications : <?php echo ($rowApplications['applicationCount'] ?? 0); ?></p>
        </article>
        <article>
            <img src="./assets/announcement.png" alt="">
            <p>Announcements : <?php echo $rowAnnouncements['announcementCount']; ?></p>
        </article>
        <article>
            <img src="./assets/complaint.png" alt="">
            <p>Complaints : <?php echo $rowComplaints['complaintCount']; ?></p>
        </article>
    </section>
    <section id="contact">
        <h1 class="contact-title" >Contact Us</h1>
        <p class="contact-intro">
            Get in Touch with the Developers
        </p>
        <div class="contact-info-upper-container">
            <div class="contact-info-container">
                <img src="./assets/email.png" alt="email icon" class="icon contact-icon email-icon"/>
                <p><a href="mailto:abc.com">Thestudenthelpdeskdev@gmail.com</a></p>

            </div>
            <div class="contact-info-container">
                <img src="./assets/linkedin.png" alt="linkedin icon" class="icon contact-icon"/>
                <p><a href="https://www.linkedin.com">Devlopers</a></p>
            </div>
        </div>
    </section>
    <footer>
        <nav>
            <div class="nav-links-container">
                <ul class="nav-links">
                    <li><a href="#">Admin's Dashboard</a></li>
                </ul> 
            </div>
        </nav>
        <p>Copyright &#169 2023 Student HelpDesk. All Rights Reserved</p>
    </footer>
</body>
</html>