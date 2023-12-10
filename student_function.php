<?php
session_start();

function SLoggedIn() {
    return isset($_SESSION['Suname']) && isset($_SESSION['SId']);
}
?>