<?php
    $seconds = -10 +  time();
    setcookie('loggedin_admin' , date("F jS - g:i a"), $seconds, "/");
    setcookie('loggedin_user' , date("F jS - g:i a"), $seconds, "/");
    setcookie('loggedin_employee' , date("F jS - g:i a"), $seconds, "/");
    session_destroy();
    header('location:../index.php');
?>
