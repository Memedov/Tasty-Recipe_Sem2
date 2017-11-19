<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <Title> Tasty Recipes main page </Title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
</head>
    
<body>
    <div class="OuterBox">
        <div class="InnerBox">
            <h1> Tasty Recipes </h1>
            <h2> Taste test your taste buds </h2>
        
            <p> Thank you for stopping by the site! If you are new to Tasty Recipes, the one thing you should know is that you can only find quality recipes of good tasting food. </p>
        
            <p> There are two things we think about when deciding if a recipe is good enough to go on the site.
            First, does it work? Does the dish make us smile inside and out? Do we want to eat the whole batch by ourselves? <br><br>
            
            Second, if the dish tastes great, is it worth the effort? Do we want to make it again? If so, the recipes will be available on this site so that you can make your favorite dishes again and again!
            </p>
        
            <p> Having many favorite tasty recipes might make it difficult to decide what to eat on a specific day. So, for that very reason exists a calendar, with clickable images, which you can check out <a href="calendar.php">here</a>.</p>
        
        </div>
    </div>

    <!-- Menu and links -->
    <div class="Menu">
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="calendar.php">Calendar</a></li>
            <li><a href="pancakes.php">Pancakes</a></li>
            <li><a href="meatballs.php">Meatballs</a></li>
            <?php 
                    if($_SESSION['uname']){
                        echo'<li><a href="logout.php">Log out</a></li>';
                    }
                    else{
                        echo'<li><a href="login.php">Login</a></li>';
                    }
            ?>
        </ul>
    </div>
</body>
</html>