<?php
include "connection.php";
$sql = "SELECT * FROM announcements";
$result = $conn->query($sql);
?>