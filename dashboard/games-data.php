<?php
include("../common/conn.php");


// Create new Faculty
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];

    $query = "SELECT * FROM games WHERE id = $id";

    $result2 = mysqli_query($conn, $query);

    while ($game = mysqli_fetch_array($result2)) {
        $games2 = array(
            'price' => $game['price'],
            'name' => $game['name'],
            'description' => $game['description'],
            'company' => $game['company'],
            'cato_id' => $game['game_cato_id'],
            'path' => basename($game['image']),
        );
    }

    echo json_encode($games2, true);
}
