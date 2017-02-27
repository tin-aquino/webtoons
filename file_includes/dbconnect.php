<?php

    define("DBSERVER" , "localhost");
    define("DBUSER" , "root");
    define("DBPASS" , "sad123");
    define("DBNAME" , "capstone");

    global $con;

    $con = mysqli_connect(DBSERVER,DBUSER,DBPASS,DBNAME);

    if(mysqli_connect_errno()) {
        die("Connection failed" . mysqli_connect_error());
    }
    else {
     //   echo "Connection successful";
    }

?>