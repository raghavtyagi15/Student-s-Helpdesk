<?php
session_start();

function check_authentication() {
    if (!isset($_SESSION['uname'])) {
        // Redirects to the login page if the user is not logged in
        header('Location: index.html');
        exit();
    }
}
?>