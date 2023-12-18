<?php
include "connection.php";

session_start();

if (isset($_POST['btn'])) {
    $Suname = mysqli_real_escape_string($conn, $_POST['username']);
    $Spassword = mysqli_real_escape_string($conn, $_POST['password']);

    if ($Suname != "" && $Spassword != "") {
        $sql_query = "SELECT count(*) as cntUsers, Id, name, enrol FROM users WHERE username='" . $Suname . "' AND password='" . $Spassword . "'";
        $result = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUsers'];

        if ($count > 0) {
            $_SESSION['Suname'] = $Suname;
            $_SESSION['name'] = $name;
            $_SESSION['SId'] = $row['Id'];
            $_SESSION['Senrol'] = $row['enrol']; 
            header('Location: indexlogin.php');
            exit();
        } else {
            echo "Invalid username and password";
        }
    }
}
?>