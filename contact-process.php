<?php

require 'common/conn.php';


// Create new Faculty
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['fname'];
    $secondName = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (firstName, lastName, email, message, status ) VALUES ('$firstName', '$secondName','$email','$message',1)";

    if ($conn->query($sql) == FALSE) {
        echo "Error" . $sql . $conn->error;
    }

    header('Location:contact_us.php?message-send=1');
}
