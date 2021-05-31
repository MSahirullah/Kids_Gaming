<?php
include("../common/conn.php");

$id = $_POST['rem_cat_id'];

$query = "SELECT id FROM games WHERE game_cato_id = '$id'";
$result = mysqli_query($conn, $query);

while ($game = mysqli_fetch_array($result)) {

    $game_id = $game['id'];

    $sql = "DELETE FROM payments WHERE game_id = '$game_id'";
    $conn->query($sql);

    $sql2 = "DELETE FROM cart WHERE game_id = '$game_id'";
    $conn->query($sql2);
}

$sql3 = "DELETE FROM games WHERE game_cato_id = '$id'";
$conn->query($sql3);

$sql4 = "DELETE FROM game_categories WHERE id = '$id'";

if ($conn->query($sql4) === TRUE) {
    header("location:users.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
