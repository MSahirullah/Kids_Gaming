<?php

require 'common/conn.php';
session_start();


if (!$_SESSION['login_user_id']) {
    header('Location:login.php');
    exit;
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $url = $_POST['url'];
    $game_id = $_POST['game_id'];
    $user_id = $_SESSION['login_user_id'];
    $price = $_POST['price'];


    $query = "SELECT * FROM cart WHERE user_id = '$user_id' and game_id = '$game_id' ";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if (!$count) {
        $sql = "INSERT INTO cart (user_id, game_id, price, status ) VALUES ('$user_id', '$game_id', '$price', 1)";

        if ($conn->query($sql) == TRUE) {
            header("Location:game_store.php?formsubmit=1");
            exit();
        }
        echo "Error" . $sql . $conn->error;
    } else {
        header("Location:game_store.php?formsubmit=2");
        exit();
    }
}
