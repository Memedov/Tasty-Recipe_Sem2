<?php
    session_start();

    // Parse users.txt
    $commentData = file('containerMeatballs.html');
    $i = 0;
    $accessData = array();
    foreach ($commentData as $line){
        if(strpos($line, $_SESSION['uname']) !== false){
            list($comment, $user) = explode('hidden>', $line);
            $accessData[$i++] = trim($user);
        }
    }

    /* Only post non-empty comments */
    if($_POST && !empty($_POST['comment'])){
        $content = $_POST['comment'];
        $handle = fopen("containerMeatballs.html", "a");
        $t=time();
        fwrite($handle, "<b>". $_SESSION['uname']." ".gmdate("Y-m-d",$t)."</b>:<br>".$content."<p hidden>".time().",".$_SESSION['uname']."</p><br><br>"."\n");
        fclose($handle);
        header("Refresh:0");
    }
    
    /* Deletes a specific comment from a certain user */
    if($_POST['Delete']){
        file_put_contents('containerMeatballs.html','');
        foreach($commentData as $line){
            if(strpos($line, $_POST['timestamp']) === false){
                $accessData[$i++];
           
                $handle = fopen("containerMeatballs.html", "a");
                fwrite($handle, $line);
                fclose($handle);
            }
        }
        header("Refresh:0");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <Title> Meatballs recipe page </Title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
</head>
    
<body>
    <div class="OuterBoxMeatballs">
        <div class="InnerBoxMeatballs">
            <h1> Meatballs </h1>
            <h2> Italian Meatballs </h2>
        
            <img src="ItalianMeatballs.jpg" alt="Italian Meatballs">
        
            <p> Ingredients: </p>
        
            <ul id="MeatballsIngr">
                <li>1/3 cup plain bread crumbs</li>
                <li>1/2 cup milk</li>
                <li>2 tablespoons olive oil</li>
                <li>1 onion, diced</li>
                <li>1 pound ground beef</li>
                <li>1 pound pork</li>
                <li>2 eggs</li>
                <li>1/4 bunch fresh parsley, chopped</li>
                <li>3 cloves garlic, crushed</li>
                <li>2 teaspoons salt</li>
                <li>1 teaspoon ground black peppar</li>
                <li>1/2 teaspoon red pepper flakes</li>
                <li>1 teaspoon dried Italian herb seasoning</li>
                <li> 2 tablespoons grated Parmesan cheese</li>
            </ul>
            <hr>
            <p> Directions: </p>
        
            <div class="MeatballsInstr">
                <ol>
                    <li> Cover a baking sheet with foil and spray lightly with cooking spray </li>
                    <li> Soak bread crumbs in milk in a small bowl for 20 minutes </li>
                    <li> Heat olive oil in a skillet over medium heat. Cook and stir onions in hot oil until translucent, about 20 minutes </li>
                    <li> Mix beef and pork together in a large bowl.  Stir onions, bread crumb mixture, eggs, parsley, garlic, salt, black pepper, red pepper flakes, Italian herb seasoning, and Parmesan cheese into meat mixture with a rubber spatula until combined. Cover and refrigerate for about one hour. </li>
                    <li> Preheat an oven to 425 degrees F (220 degrees C). </li>
                    <li> Using wet hands, form meat mixture into balls about 1 1/2 inches in diameter. Arrange onto prepared baking sheet. </li>
                    <li> Bake in the preheated oven until browned and cooked through, 15 to 20 minutes. </li>
                </ol>
            </div>
            <hr>
            
            <?php 
                if($_SESSION['uname']){
                    echo'
                        <div class="Comment">
                            <form action="" method="POST">
                            <label>Comment</label>
                            <input id="comment" name="comment" placeholder="Type your comment here.." type="text">
                            <input type="submit" value="Post comment">
                            </form>
                        </div>
                        <hr>
                        ';
                }
            ?>    
                
            <div class="CommentBox">
                <div class="Comment">
                    <?php
                        $commentData = file('containerMeatballs.html');
                        $j = 0;
                        foreach ($commentData as $line) {
                            if(strpos($line, $_SESSION['uname']) !== false) {
                                echo $line;
                                $timestamp = $accessData[$j];
                                $j++;
                                echo '
                                    <form method = "POST" action="">
                                        <input type="submit" value="Delete" name = "Delete">
                                        <input type="hidden" value="'.$timestamp.'" name="timestamp">
                                    </form>
                                ';
                            }
                            else
                                echo $line;
                        }   
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu and links -->
    <div class="Menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="calendar.php">Calendar</a></li>
            <li><a href="pancakes.php">Pancakes</a></li>
            <li><a class="active" href="meatballs.php">Meatballs</a></li>
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