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
    <title>EDIT RECIPE</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/newrecipe.css">
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<body>

    <header>
        <p> </p>
        <h1>EDIT RECIPE</h1>
        <a href="./index.php"><h3>X</h3></a>
    </header>

    <main>

    <?php 
        
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $sql = "SELECT * FROM recipes WHERE id = $id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            ?>

            <form action="process.php" method="post" enctype="multipart/form-data">
                    <section class="inputs">

                        <div class="up">
                            <div class="in-left">
                                <div class="name-div">
                                    <label class="label" for="dname">DISH NAME</label><br>
                                    <input class="name-input" type="text" id="dname" name="dname" value="<?php echo $row["title"] ?>"><br>
                                </div>

                                <div class="ing-div">
                                    <label class="label" for="ing">INGREDIENTS</label><br>
                                    <textarea class="ing-input" id="ing" name="ing"><?php echo $row["ingredients"]; ?></textarea>
                                </div>
                            </div>

                            <div class="in-right">
                                <input type="file" id="image" name="image" accept="image/*" style="display: none;">
                                
                                <label for="image" class="custom-upload">
                                    <img src="./svg/button-upimg.svg" alt="button pro upload foto">
                                </label>
                            </div>
                            
                        </div>

                        <div class="down">
                            <div class="desc-div">
                                <label class="label" for="desc">DESCRIPTION</label><br>
                                <textarea class="desc-input" id="desc" name="desc"><?php echo $row["description"]; ?></textarea>
                            </div>
                            <input type="hidden" name="id" value='<?php echo $row['id'];?>'> 
                            <input type="submit" value="SAVE CHANGES" class="addrecipe" name="edit">
                        </div>
                        
                    </section>
                </form>

            <?php 

            
        }
    
    ?>
  
</main>

</body>
</html>