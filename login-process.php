<?php
// Initialize the session

include("common/conn.php");
session_start();

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $useremail = mysqli_real_escape_string($conn, $_POST['email']);
    $userpassword = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate credentials
    if (!empty($useremail) && !empty($userpassword)) {

        $sql = "SELECT email, firstName, lastName FROM users WHERE email = '$useremail' and password = '$userpassword' and role = 'ROLE_USER'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['active'];
        $count = mysqli_num_rows($result);

        // If result matched $myusername and $userpassword, table row must be 1 row

        if ($count == 1) {
            //session_register("useremail");
            $_SESSION['login_user_email'] = $row['email'];
            $_SESSION['login_user_firstname'] = $row['firstName'];
            $_SESSION['login_user_lastname'] = $row['lastName'];
            $_SESSION['login_user_role'] = 'ROLE_USER';

            header("location: index.php");
        } else {
            $error = "Your Login Name or Password is invalid";
        }
    }
}
