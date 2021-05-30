<?php
include("../common/conn.php");

$table = $_POST['table'];
$id = $_POST['t_id'];
$url = $_POST['url'];

$sql = "DELETE FROM $table WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("location:$url");
} else {
  echo "Error deleting record: " . $conn->error;
}
?>