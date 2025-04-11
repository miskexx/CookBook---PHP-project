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
    <title>RECIPE</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/inspect.css">
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<body>
    <?php  
        
        if(isset ($_GET["id"])){
            $id = $_GET["id"];
            $sql = "SELECT * FROM recipes WHERE id=$id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
    ?> 
        <header>
            <button id="edit" onclick="window.location.href = './edit.php?id=<?php echo $row['id']; ?>'">EDIT</button>
            <h1 class="nazev"><?php echo $row["title"] ?></h1>
            <a href="./index.php"><h3>X</h3></a>
        </header>
    
        <main>
            <section class="recept">
                <img class="inspect-img" src="<?php echo "./uploads/" . $row['image_url'] ?>" alt="obrazek">
                <p><?php echo $row["ingredients"] ?></p>
                <p><?php echo $row["description"] ?></p>

                        <?php
                    }
                
                ?>
            </section>
        </main>

    

</body>
</html>