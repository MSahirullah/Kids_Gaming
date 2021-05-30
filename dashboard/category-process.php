<?php
require '../common/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Create Category
    if (isset($_POST["create"])) {

        $cat_name = $_POST['catName'];
        $sql = "INSERT INTO game_categories (name, status ) VALUES ('$cat_name', 1)";

        if ($conn->query($sql) == FALSE) {
            echo "Error" . $sql . $conn->error;
        }

        header('Location:game-categories.php');
    }


    // Edit Category
    if (isset($_POST["edit"])) {
        $cat_id = $_POST['cat_id'];
        $cat_name = $_POST['catName'];
        $query = "UPDATE game_categories SET name ='" . $cat_name . "' WHERE id = '" . $cat_id . "'";
        if (mysqli_query($conn, $query)) {
            $status = 1;
        }
        header('Location:game-categories.php');
    }


    // Remove Category
    if (isset($_POST["remove"])) {

        $id = $_POST["rem_cat_id"];
        $query = "DELETE FROM game_categories WHERE id = '" . $id . "'";
        if (mysqli_query($conn, $query)) {
            $status = 1;
        }
        header('Location:game-categories.php');
    }
}
