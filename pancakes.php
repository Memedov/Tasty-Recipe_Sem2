<?php
    session_start();

    // Parse users.txt
    $commentData = file('containerPancakes.html');
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
        $handle = fopen("containerPancakes.html", "a");
        $t=time();
        fwrite($handle, "<b>". $_SESSION['uname']." ".gmdate("Y-m-d",$t)."</b>:<br>".$content."<p hidden>".time().",".$_SESSION['uname']."</p><br><br>"."\n");
        fclose($handle);
        header("Refresh:0");
    }

    if($_POST['Delete']){
        file_put_contents('containerPancakes.html','');
        foreach($commentData as $line){
            if(strpos($line, $_POST['timestamp']) === false){
                $accessData[$i++];
           
                $handle = fopen("containerPancakes.html", "a");
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
    <Title> Pancakes recipe page </Title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
</head>
    
<body>
    <div class="OuterBoxPancakes">
        <div class="InnerBoxPancakes">
            <h1> Pancakes </h1>
            <h2> Swedish Pancakes </h2>
        
            <img src="SwedishPancakes.jpg" alt="Swedish Pancakes">
        
            <p> Ingredients: </p>
        
            <ul id="PancakesIngr">
                <li> 4 eggs</li>
                <li>2 cups milk</li>
                <li>1/2 cup all-purpose flour</li>
                <li>1 tablespoon sugar</li>
                <li>1 pinch salt</li>
                <li>2 tablespoons melted butter</li>
                
            </ul>
            <hr>
            <p> Directions: </p>
        
            <div class="PancakesInstr">
                <ol>
                    <li> In a large bowl, beats eggs with a wire whisk. Mix in milk, flour, sugar, salt, and melted butter </li>
                    <li> Preheat a non-stick electric skillet to medium heat. Pour a thin layer of batter on skillet, and spread to edges. Cook until top surface appears dry. Cut into 2 or 4 sections, and flip with a spatula. Cook for another 2 minutes, or until golden brown. Roll each pancake up, and serve. </li>
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
                        $commentData = file('containerPancakes.html');
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
            <li><a class="active" href="pancakes.php">Pancakes</a></li>
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