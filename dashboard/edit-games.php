<?php
include("../common/conn.php");


// Create new Faculty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $path = '';
    $id = $_POST['t_id'];


    $gameName = $_POST['gameName'];
    $company = $_POST['company'];
    $category = $_POST['cato'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE games SET price = '$price', name='$gameName', company='$company', game_cato_id='$category', description='$description', price='$price' WHERE id ='$id'";


    if (isset($_FILES['image'])) {

        $file_name = $_FILES['image']['name'];

        if ($file_name != '') {
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

                    $sql = "UPDATE games SET price = '$price', name='$gameName', company='$company', game_cato_id='$category', description='$description', price='$price', image='$path' WHERE id ='$id'";
                } else {
                    echo "Faild";
                }
            } else {
                print_r($errors);
            }
        }
    }

    if ($conn->query($sql) == TRUE) {
        header("location:games.php");
    }
    echo "Error" . $sql . $conn->error;
}
