<?php

// Handle Post
if (count($_POST)){
    
    // Parse users.txt
    $loginData = file('users.txt');
    $accessData = array();
    foreach ($loginData as $line){
        list($username, $password) = explode(',', $line);
        $accessData[trim($username)] = trim($password);
    }

    // Parse form users input
    $uname = isset($_POST['uname']) ? $_POST['uname'] : '';
    $psw = isset($_POST['psw']) ? $_POST['psw'] : '';

    // Check input and users.txt data, depending on match; redirects to specific page
    if (array_key_exists($uname, $accessData) && $psw == $accessData[$uname]){
        session_start();
        $_SESSION['uname'] = $uname;
        header('Location: http://localhost/index.php');
    } 
    else{
        header('Location: http://localhost/loginAgain.html');
    }
}
else{
    header('Location: http://localhost/login.html');
}

?>