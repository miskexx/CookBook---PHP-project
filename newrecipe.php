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
    <title>NEW RECIPE</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/newrecipe.css">
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<body>

    <header>
        <p> </p>
        <h1>NEW RECIPE</h1>
        <a href="./index.php"><h3>X</h3></a>
    </header>

    <main>

    <form action="process.php" method="post" enctype="multipart/form-data">
        <section class="inputs">

            <div class="up">
                <div class="in-left">
                    <div class="name-div">
                        <label class="label" for="dname">DISH NAME</label><br>
                        <input class="name-input" type="text" id="dname" name="dname"><br>
                    </div>

                    <div class="ing-div">
                        <label class="label" for="ing">INGREDIENTS</label><br>
                        <textarea class="ing-input" type="text" id="ing" name="ing"></textarea>
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
                    <textarea class="desc-input" id="desc" name="desc"></textarea>
                </div>
                
                <input type="submit" value="ADD RECIPE" class="addrecipe" name="create">
            </div>
            
        </section>
    </form>
  








    </main>

</body>
</html>