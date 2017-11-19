<?php
    if (count($_POST)){
        $uname = $_POST['uname'];
        $password = $_POST['psw'];
        $handle = fopen("users.txt", "a");
        fwrite($handle,"\n".$uname.','.$password);
        fclose($handle);
        header('Location: http://localhost/login.html');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <Title> Login page </Title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
</head>
    
<body>
    <div class="OuterBox">
        <div class="InnerBox">
            <h1> Sign up </h1>
            
            <form  id="SignUp" action="/signUp.php" method="post">
  
                <div class="imgcontainer"> <img src="avatar.png" alt="Avatar" class="avatar">
                </div>
                <div>
                    <h2> Register for free! </h2>
                </div>

                <div class="container">
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Choose a username.." name="uname" required>

                    <label><b>Password</b></label>
                    <input type="password" placeholder="Choose a password.." name="psw" required>

                    <button type="submit">Register</button>
                </div>

                <div class="container">
                    <button type="button" class="cancelbtn"><a href="signUp.php">Cancel</a></button>
                </div>
                
            </form>
        </div>
    </div>

    <!-- Menu and links -->
    <div class="Menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="calendar.php">Calendar</a></li>
            <li><a href="pancakes.php">Pancakes</a></li>
            <li><a href="meatballs.php">Meatballs</a></li>
            <li><a id="login" class="active" href="login.html">Login</a></li>
        </ul>
    </div>
</body>
</html>