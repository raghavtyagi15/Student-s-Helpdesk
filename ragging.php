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
    <title>Ragging Complaint</title>
    <link rel="stylesheet" href="stylesheet.css">
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
        <a href="track_application.php"><p>Hello, <?php echo $studentName; ?>!</p></a>
    </div>
    
    <section id="corner-container">
        <div class="corner-title-container">
            <h1>Ragging Complaint</h1>
            <div class="corner-subtitle-container">
                <h2>Swift Ragging Complaints Via. Student's HelpDesk</h2>
                <div class="corner-text-container">
                    <p>Swiftly addresses any ragging complaints with our system, prioritizing student well-being and fostering a safe educational environment.</p>
                    <div class='form-container'>
                        <form action="Ragging_insert.php" method="post" enctype="multipart/form-data">
                            <?php
                                // if success message is present in the URL prints message
                                if (isset($_GET['message']) && $_GET['message'] === 'success') {
                                    echo '<p style="color: green; margin-left:4rem; font-weight:600; margin-bottom: 2rem; text-align:center; ">Your Application has been submitted successfully!</p>';
                                }
                            ?>  
                            <input type="text" placeholder="First Name " name="Fname" required>
                            <input type="text" placeholder="Last Name " name="Lname" required>
                            <input type="text" placeholder="Enrolment Number" name="Enrol" pattern="[0-9]{11}"required>
                            <input type="text" placeholder="Mobile Number " name="Phone" pattern="[0-9]{10}"required>
                            <input type="text" placeholder="Course " name="Course" required>
                            <input type="number" placeholder="Semester " name="Sem" required>
                            <textarea name="Description" rows="3" cols="5">Description of the Incident</textarea>
                            <label for="birthday">Incident Date:</label>
                            <input type="date" id="date" name="Idate">
                            <label for="Proof" class="file-input">Upload Pictures in Case of any Injury :</label>
                            <input type="file" id="Proof" name="Proof" accept="image/*">
                            <label>
                                <input type="checkbox" id="agreeDeclaration" name="agreeDeclaration" required>
                                I Agree that the information provided is accurate to the best of my knowledge.
                              </label>
                            <div class="button-container">
                                 <input type="submit" value="Submit" class="btn" name="send">
                            </div>         
                        </form>
                    </div-form-container>
                </div>
            </div>
        </div>
    </section>
</body>
</html>