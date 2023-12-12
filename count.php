<?php
include "connection.php";

$sqlStudents = "SELECT COUNT(*) as studentCount FROM users";
$sqlApplications = "SELECT COUNT(*) as applicationCount FROM sports UNION SELECT COUNT(*) FROM society UNION SELECT COUNT(*) FROM medical";
$sqlAnnouncements = "SELECT COUNT(*) as announcementCount FROM announcements";
$sqlComplaints = "SELECT COUNT(*) as complaintCount FROM ragging";

$resultStudents = $conn->query($sqlStudents);
$resultApplications = $conn->query($sqlApplications);
$resultAnnouncements = $conn->query($sqlAnnouncements);
$resultComplaints = $conn->query($sqlComplaints);

// Check for errors
if (!$resultStudents || !$resultApplications || !$resultAnnouncements || !$resultComplaints) {
    die("Error in SQL queries: " . $conn->error);
}

// Fetch counts
$rowStudents = $resultStudents->fetch_assoc();
$rowApplications = $resultApplications->fetch_assoc();
$rowAnnouncements = $resultAnnouncements->fetch_assoc();
$rowComplaints = $resultComplaints->fetch_assoc();

// Close connection
$conn->close();
?>