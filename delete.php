<?php 


if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("connection.php");
    include("functions.php");

    $sql = "DELETE FROM recipes WHERE id=$id";
}
if(mysqli_query($con, $sql)){
    echo"Recipe was deleted";
    header("Location: index.php?msg=recipe+deleted");
}

?>