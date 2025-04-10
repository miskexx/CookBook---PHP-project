<?php 
session_start();

$error = "";
if(isset($_GET["msg"])){
    $error = $_GET["msg"];
}

include ("connection.php");
include ("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);

            // OVĚŘENÍ HASHOVANÉHO HESLA
            if(password_verify($password, $user_data['password'])){
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            }
        }

        $error =  "Wrong username or password!"; 
    } else {
        $error = "Please enter some valid information";
    }
}
?>



<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/login.css">
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<body>

<main>

    <h1>LOGIN</h1>

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

                <div class="input-button">
                    
                    <input type="submit" value="Login" class="submit">
                    <a class="submit" href="signup.php">Signup</a>
                </div>

            </form>
         
        </section>
            <?php 
                if(!empty($error)){
                   echo htmlspecialchars($error, ENT_QUOTES);
                }
            ?>
</main>
</body>
</html>