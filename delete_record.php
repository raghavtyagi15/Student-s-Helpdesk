<?php
include "connection.php";

if (isset($_GET['Id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['Id']);

    // Perform the deletion in the database
    $sql = "DELETE FROM announcements WHERE Id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>