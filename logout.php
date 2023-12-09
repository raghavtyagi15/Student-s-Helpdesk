<?php
session_start();

// Logout functionality
session_unset();
session_destroy();

// Redirect to the login page after logout
header('Location: login.html');
exit();
?>