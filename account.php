<?php 

    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

?>




<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/logout.css">
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<body>
        <div class="account">

            <h1><?php echo $user_data['user_name'];?></h1>
            
            <div class="odkazy">
                <a id="Back" href="index.php">Back</a>
                <a id="logout" href="logout.php">Logout</a>
            </div>
             

        </div>
       


</body>
</html>