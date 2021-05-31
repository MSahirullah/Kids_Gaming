<?php
include("common/conn.php");

$id = $_POST['cart_id'];
$url = $_POST['url'];

$sql = "DELETE FROM cart WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("Location:game_store.php?formsubmit=3");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
