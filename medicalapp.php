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
    <title>Medical Application</title>
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
        <p>Hello, <?php echo $studentName; ?>!</p>
    </div> 
    
    <section id="corner-container">
        <div class="corner-title-container">
            <h1>Medical Application</h1>
            <div class="corner-subtitle-container">
                <h2>Hassle Free Medical Leave Application Via. Student's HelpDesk</h2>
                <div class="corner-text-container">
                    <p>Effortless submission of medical certificates for a seamless and efficient leave request process.</p>
                    <div class='form-container'>
                        <form action="medical_insert.php" method="post" enctype="multipart/form-data">
                            <?php
                                // Check if a success message is present in the URL prints message
                                if (isset($_GET['message']) && $_GET['message'] === 'success') {
                                    echo '<p style="color: green; margin-left:4rem; font-weight:600; margin-bottom: 2rem; text-align:center; ">Your Application has been submitted successfully!</p>';
                                }
                            ?>  
                            <input type="text" placeholder="First Name " name="Fname" required>
                            <input type="text" placeholder="Last Name " name="Lname" required>
                            <input type="text" placeholder="Enrolment Number " name="Enrol" pattern="[0-9]{10}"required>
                            <input type="text" placeholder="Course " name="Course" required>
                            <input type="number" placeholder="Semester " name="Sem" required>
                            <textarea name="Reason" rows="5" cols="5">Reason for Medical Leave Application</textarea>
                            <label for="birthday">Starting Date :</label>
                            <input type="date" id="start" name="Sdate">
                            <label for="birthday">Ending Date :</label>
                            <input type="date" id="end" name="Edate">
                            <label for="certificate-image" class="custom-file-input">Upload Medical Certificate :</label>
                            <input type="file" id="certificate-image" name="Certificate" accept="image/*">
                            <div class="button-container">
                                 <input type="submit" value="Submit" class="btn" name="send">
                            </div>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>