<?php
require 'common/conn.php';
session_start();

if (isset($_SESSION['login_user_email'])) {
    header('Location:index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (firstName, lastName, email, password, role, status ) VALUES ('$firstName','$lastName','$email','$password','ROLE_USER', 1)";

    if ($conn->query($sql) == TRUE) {
        $_SESSION['login_user_email'] = $email;
        $_SESSION['login_user_firstname'] = $firstName;
        $_SESSION['login_user_lastname'] = $lastName;
        $_SESSION['login_user_role'] = 'ROLE_USER';

        $query = "SELECT id FROM users WHERE email = '$email'";
        $result2 = mysqli_query($conn, $query);
        $id = mysqli_fetch_array($result2);

        $_SESSION['login_user_id'] = $id[0];



        header('Location:index.php');
    } else {

        header('Location:register.php');
    }
}
