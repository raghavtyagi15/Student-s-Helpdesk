<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['adminuname']) && isset($_SESSION['adminId']);
}
?>