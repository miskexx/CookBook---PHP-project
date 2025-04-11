<?php 

    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    $msg = "";
    if(isset($_GET["msg"])){
    $msg = $_GET["msg"];
    }
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKBOOK</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/home.css">
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<body>
    <header>
          <a href="account.php"><h2><?php echo "Hello, ". $user_data['user_name'];?></h2></a> 
        
        <h1>COOKBOOK</h1>
        <a href="./newrecipe.php"><h3>ADD RECIPE</h3></a>
    </header>
    
    <main>

            <?php 
                if (!empty($msg)) {
                    echo '<div class="error-message" id="flash-message"> ' . htmlspecialchars($msg, ENT_QUOTES) . '</div>';
                }
            ?>

        <div class="cards-div">

                <?php 
                $sql = "SELECT recipes.*, users.user_name FROM recipes 
                        JOIN users ON recipes.user_id = users.id";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($result)){
                ?>
                    <div class="card">
                        <div class="card-img">
                            <a href="./inspect-recipe.php?id=<?php echo $row['id']?>"><img src="<?php echo "./uploads/" . $row['image_url'] ?>" alt="obrazek"></a>
                        </div>

                        <div class="card-content">
                            <h2 id="dish-name"><?php echo $row["title"]?></h2>
                            <h5 id="uzivatel"><?php echo $row["user_name"]?></h5>

                            <div class="card-buttons">
                                <button id="delete" onclick="window.location.href = './delete.php?id=<?php echo $row['id']; ?>'">DELETE</button>
                                <button id="edit" onclick="window.location.href = './edit.php?id=<?php echo $row['id']; ?>'">EDIT</button>
                            </div>
                        </div>
                    </div>
                <?php
                };
                ?>

    </div>
    </main>

    
<script src="flash.js"></script>
</body>
</html>