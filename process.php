<?php 
session_start();

include("connection.php");
include("functions.php");



if(isset($_POST["create"])){

    $user_id = $_SESSION['user_id']; // <- přihlášený uživatel


    $dname = mysqli_real_escape_string($con, $_POST["dname"]);
    $ing = mysqli_real_escape_string($con, $_POST["ing"]);
    $desc = mysqli_real_escape_string($con, $_POST["desc"]);

    $image_name = "default.svg"; // výchozí obrázek
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $tmp_name = $_FILES['image']['tmp_name'];
        $original_name = basename($_FILES['image']['name']);
        $extension = strtolower(pathinfo($original_name, PATHINFO_EXTENSION)); 
        $new_name = uniqid() . "." . $extension;

        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($extension, $allowed_extensions)) {
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true); // vytvoř složku pokud neexistuje
            }

            if (move_uploaded_file($tmp_name, $target_dir . $new_name)) {
                $image_name = $new_name;
            }
        }
    }


    $sql = "INSERT INTO recipes (user_id ,title, ingredients, description, image_url) VALUES ('$user_id', '$dname', '$ing', '$desc', '$image_name');";

    if(mysqli_query($con, $sql)){
        header("Location: index.php");
    }else{
        die("Something went wrong");
    }
}

if(isset($_POST["edit"])){

    $user_id = $_SESSION['user_id']; // <- přihlášený uživatel


    $dname = mysqli_real_escape_string($con, $_POST["dname"]);
    $ing = mysqli_real_escape_string($con, $_POST["ing"]);
    $desc = mysqli_real_escape_string($con, $_POST["desc"]);
    $id = mysqli_real_escape_string($con, $_POST["id"]);


    $image_name = "default.jpg"; // výchozí obrázek
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $tmp_name = $_FILES['image']['tmp_name'];
        $original_name = basename($_FILES['image']['name']);
        $extension = strtolower(pathinfo($original_name, PATHINFO_EXTENSION)); 
        $new_name = uniqid() . "." . $extension;

        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($extension, $allowed_extensions)) {
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true); // vytvoř složku pokud neexistuje
            }

            if (move_uploaded_file($tmp_name, $target_dir . $new_name)) {
                $image_name = $new_name;
            }
        }
    }


    $sql = "UPDATE recipes SET title = '$dname',  ingredients = '$ing', description = '$desc', image_url = '$image_name' WHERE id =$id";

    if(mysqli_query($con, $sql)){
        header("Location: index.php");
    }else{
        die("Something went wrong");
    }
}


 ?>

