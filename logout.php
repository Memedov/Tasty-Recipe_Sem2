<?php
    // Unsets the current session and redirects to login-page
    session_start();
    unset($_SESSION['uname']);
    header('Location: http://localhost/login.html');
?>