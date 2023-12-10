<?php
include "connection.php";

session_start();

if(isset($_POST['btn'])){
    $adminuname = mysqli_real_escape_string($conn,$_POST['Ausername']);
    $adminpassword = mysqli_real_escape_string($conn,$_POST['Apassword']);

    if ($adminuname != "" && $adminpassword != ""){
        $sql_query = "SELECT count(*) as cntAdmin, id FROM admin WHERE Ausername='".$adminuname."' AND Apassword='".$adminpassword."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntAdmin'];

        if($count > 0){
            $_SESSION['adminuname'] = $adminuname;
            $_SESSION['adminId'] = $row['id'];
            header('Location: admin.php');
        } else {
            echo "Invalid username and password";
        }
    }
}
?>