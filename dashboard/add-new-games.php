<?php
include("../common/conn.php");


// Create new Faculty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $path = '';

    if (isset($_FILES['image'])) {

        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $path = "game_images/" . $file_name;

            if (move_uploaded_file($file_tmp, __DIR__ . '/../' . $path)) {
                echo "Success";
            } else {
                echo "Faild";
            }
        } else {
            print_r($errors);
        }
    }

    $gameName = $_POST['gameName'];
    $company = $_POST['company'];
    $category = $_POST['cato'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO games(price, name, description, company, game_cato_id, image, status ) VALUES ('$price', '$gameName','$description','$company', '$category', '$path', 1)";

    if ($conn->query($sql) == TRUE) {
        header("location:games.php");
    }
    echo "Error" . $sql . $conn->error;
}
