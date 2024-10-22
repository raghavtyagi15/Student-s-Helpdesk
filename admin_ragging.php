<?php
include "functions.php";

if (!isLoggedIn()) {
    header("Location: admin_login.html");
    exit();
}
?>

<?php
include "connection.php";

if (isset($_GET['Id'])) {
    $Id = mysqli_real_escape_string($conn, $_GET['Id']);

    // Update the status in the database
    $updateStatusQuery = "UPDATE `ragging` SET `status` = 0 WHERE `Id` = '$Id'";
    $updateStatusResult = mysqli_query($conn, $updateStatusQuery);
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
        table {
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto; /* Add this line to center the table horizontally */
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid darkgray;
            font-weight: 600;
        }

        th {
            background-color: rgb(234, 255, 0);
            color: rgb(0, 0, 0);
        }

        td {
            background-color: black;
            color: whitesmoke;
        }
        .data-container {
            
            border-radius: 25px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 20px 100px;
        }
        #ragging-complaints {
            margin: 1rem auto;
            padding: 4rem 1rem;
        }

        h1 {
            font-size: 3rem;
            text-align: center;
            margin: 0 auto;
            color: white;
        }

        p {
            font-size: 1rem;
            font-weight: 500;
            color: gray;
            text-align: center;
            margin: 0.5rem 2rem auto;
            margin-bottom: 4rem;
        }
        .btn {
            background: greenyellow;
            color: white;
            font-size: 1em;
            padding: 5px 29px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: darkred;
            
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
                <a href="admin.php" class="dropbtn">Home</a>
                <a href="admin_logout.php" class="dropbtn">Log-out</a>
            </ul>
        </div>
    </nav>

    <section id="ragging-complaints">
        <div class="title-container">
            <h1>Ragging Complaints</h1>
            <p> Address complaints, prioritizing transparency and resolution.</p>
            <div class="data-container">
            <?php
include "retrieve_ragging.php";

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Enrolment Number</th><th>Phone</th><th>Course</th><th>Semester</th><th>Description</th><th>Incident Date</th><th>Submission Date</th><th>Proof Image</th><th>Action</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Id"] . "</td>";
        echo "<td>" . $row["Fname"] . "</td>";
        echo "<td>" . $row["Lname"] . "</td>";
        echo "<td>" . $row["Enrol"] . "</td>";
        echo "<td>" . $row["Phone"] . "</td>";
        echo "<td>" . $row["Course"] . "</td>";
        echo "<td>" . $row["Sem"] . "</td>";
        echo "<td>" . $row["Description"] . "</td>";
        echo "<td>" . $row["Idate"] . "</td>";
        echo "<td>" . $row["SubmissionDate"] . "</td>";
        echo "<td>";
        
        // Display proof image if available
        if (!empty($row["Proof"])) {
            echo "<a href='" . $row["Proof"] . "' target='_blank'>View Proof</a>";
        } else {
            echo "No Image";
        }

        echo "</td>";
        echo "<td>";

        // Display status button or addressed span
        if ($row["Status"] == 1) {
            echo "<a href='admin_ragging.php?Id=" . $row["Id"] . "' class='btn'>Pending</a>";
        } else {
            echo "<span style='background: darkred; color: white; font-size: 1em; padding: 5px 20px; text-decoration: none;'>Addressed</span>";
        }

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}
?>
            </div>
        </div>
    </section>
</body>
</html?