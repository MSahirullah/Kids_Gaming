<?php
require '../common/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $adminFname = $_POST['adminFName'];
    $adminLname = $_POST['adminLName'];
    $adminEmail = $_POST['adminEmail'];
    $adminPass = $_POST['adminPass'];

    $sql = "INSERT INTO users (firstName, lastName, email, password, role, status ) VALUES ('$adminFname','$adminLname','$adminEmail','$adminPass','ROLE_ADMIN', 1)";

    if ($conn->query($sql) == FALSE) {
        echo "Error" . $sql . $conn->error;
    }

    header('Location:admin.php');
}
