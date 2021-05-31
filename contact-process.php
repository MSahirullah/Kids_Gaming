<?php include 'common/header.php';


require 'common/conn.php';


// Create new Faculty
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['fname'];
    $secondName = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (firstName, lastName, email, message, status ) VALUES ('$firstName', '$secondName', '$email', '$message', 1)";

    if ($conn->query($sql) == TRUE) {
        //     $_SESSION['status'] = 1;
        //     header('Location:contact_us.php');

        header("Location:contact_us.php?formsubmit=10");
        exit();
    }

    echo "Error" . $sql . $conn->error;
}
