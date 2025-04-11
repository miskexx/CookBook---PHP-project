<?php 
session_start();

include ("connection.php");
include ("functions.php");

    $error = "";
    if(isset($_GET["msg"])){
        $error = $_GET["msg"];
    }

    function register($user_name, $password, $secret_code, $con){
        $correct_secret_code = "tajnykod";
    
        if($secret_code !== $correct_secret_code){
            header("Location: signup.php?msg=wrong+secret+code");  
            return;
        }
    
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
    
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            $stmt = $con->prepare("INSERT INTO users (user_name, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $user_name, $hashed_password);
            $stmt->execute();
            $stmt->close();
    
            header("Location: login.php?msg=register+succesfully");
    
        } else {
            header("Location: signup.php?msg=zadej+platne+udaje");
        }
    }


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $secret_code = $_POST['secret_code'];

    register($user_name, $password, $secret_code, $con);
}
?>




<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/login.css">
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<body>

<main>

    <h1>SIGNUP</h1>

        <section class="login">
            <form method="post">

                <div class="input">
                    <label class="label" for="jmeno">Username: </label>
                    <input class="policko" type="text" id="user_name" name="user_name">
                </div>

                <div class="input">
                    <label class="label" for="psw">Password: </label>
                    <input class="policko" type="password" id="password" name="password">
                </div>
                <div class="input">
                    <label class="label" for="secret_code">Secret Code: </label>
                    <input class="policko" type="password" id="secret_code" name="secret_code">
                </div>

                <div class="input-button">
                    
                    <input type="submit" value="Signup" class="submit">
                    <a class="submit" href="login.php">Click to login</a>
                </div>

            </form>
        </section>
 
</main>

            <?php 
                if (!empty($error)) {
                    echo '<div class="error-message" id="flash-message"> ' . htmlspecialchars($error, ENT_QUOTES) . '</div>';
                }
            ?>

<script src="flash.js"></script>
</body>
</html>