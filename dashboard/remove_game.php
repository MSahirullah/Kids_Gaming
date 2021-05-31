<?php
include("../common/conn.php");

$id = $_POST['t_id'];

$sql = "DELETE FROM payments WHERE game_id = '$id'";
$conn->query($sql);

$sql2 = "DELETE FROM cart WHERE game_id = '$id'";
$conn->query($sql2);

$sql3 = "DELETE FROM games WHERE id = '$id'";

if ($conn->query($sql3) === TRUE) {
    header("location:games.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
