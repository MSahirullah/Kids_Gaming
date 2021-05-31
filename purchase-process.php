<?php

require 'common/conn.php';
session_start();


if (!$_SESSION['login_user_id']) {
    header('Location:login.php');
    exit;
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['login_user_id'];
    $userMob =  $_POST['mobNo'];
    $method =  $_POST['p-option'];

    $query = "SELECT game_id, price FROM cart WHERE user_id = '$user_id'";

    $result = mysqli_query($conn, $query);
    $items = [];

    while ($item = mysqli_fetch_array($result)) {
        $items[] = array(
            'game_id' => $item['game_id'],
            'price' => $item['price'],
        );
    }

    $count = mysqli_num_rows($result);
    $data = "";

    for ($x = 0; $x < $count; $x++) {

        $game_id = $items[$x]['game_id'];
        $price = $items[$x]['price'];

        $data .= "('$user_id', '$game_id', '$method', $userMob, '$price', 1),";
    }


    $query = "INSERT INTO payments (user_id, game_id, payment_method, mobile_number, price, status ) VALUES " . substr($data, 0, -1) . "";

    if ($conn->query($query) == TRUE) {
        $sql = "DELETE FROM cart WHERE user_id = '$user_id'";

        if ($conn->query($sql) === TRUE) {
            header("Location:my_games.php?formsubmit=8");
            exit();
        }
    }
    echo "Error" . $query . $conn->error;

    header("Location:my_games.php?formsubmit=9");
    exit();
}
