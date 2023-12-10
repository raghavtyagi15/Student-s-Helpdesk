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
        .students-container {
            
            border-radius: 25px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 20px 100px;
        }
        #Students-details {
            margin: 7rem auto;
            padding: 4rem 5rem;
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
        }

        #add_students {
            padding: 4rem 5rem;
            margin: 0.1rem auto;
            align-items: center;
        }

        .add_s_form input[type="text"],
        .add_s_form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff; 
            color: #333; 
            font-weight: 600;
            border: 1px solid rgb(234, 255, 0); 
            border-radius: 5px;
        }


        .button-container input[type="submit"] {
            background-color: rgb(234, 255, 0);
            color: #000;
            margin-top: 1rem;
            padding: 0.7rem;
            border: none;
            font-weight: 600;
            border-radius: 5px;
            width: 101.5%;
            cursor: pointer;
            transition: background-color 300ms ease;
        }

        .button-container input[type="submit"]:hover {
            background-color: #FF1C04; 
        }
        .password-warning {
            color: red;
        }
        .add_s_title p {
            margin-bottom: 3rem;
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
    <section id="add_students">
        <div class="add_s_title">
            <h1>Register & Add Student's Details</h1>
            <p>Seamless registration of new students into the system. <br> Effortlessly capture crucial details such as student names, usernames, enrollment numbers, and secure passwords. </p>
        </div>
        <div class="add_s_form">
            <form action="insert_student.php" method="post" enctype="multipart/form-data" onsubmit="return validatePassword()">
                <?php
                    // if success message is present in the URL prints message
                    if (isset($_GET['message']) && $_GET['message'] === 'success') {
                            echo '<p style="color: lightgreen; margin-left:4rem; font-weight:600; margin-bottom: 2rem; text-align:center; ">Student Record Added Successfully!</p>';
                    }
                ?>  
                <input type="text" placeholder="Student's Name" name="name" required>
                <input type="text" placeholder="Student's Username" name="username" required>
                <input type="text" placeholder="Student's Enrolment Number" name="enrol" pattern="[0-9]{11}" required>
                <input type="password" placeholder="Student's Password" name="password" id="password" required>
                <div class="password-warning" id="passwordWarning"></div>
                <div class="button-container">
                    <input type="submit" value="Add Record" class="btn" name="send">
                </div>
            </form>
        </div>
    </section>
    <section id="Students-details">
        <div class="title">
            <h1>Student's Details & Passwords</h1>
            <p>Only students with the provided authorized usernames and passwords will have access to this system. <br> Please ensure the confidentiality and security of the login credentials to maintain the integrity of the student login process.</p>
        </div>
        <div class="students-container">
            <?php
                include "retrieve_students.php";
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Name</th><th>User-name</th><th>Password</th><th>Enrolment Number</th></tr>";
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["Enrol"] . "</td>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
            ?>
        </div>
    </section>

<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var passwordWarning = document.getElementById("passwordWarning");

        // Password criteria
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordRegex.test(password)) {
            passwordWarning.innerHTML = "Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, one digit, and one special character.";
            return false;
        } else {
            passwordWarning.innerHTML = "";
            return true;
        }
    }
</script> 
</body>
</html>