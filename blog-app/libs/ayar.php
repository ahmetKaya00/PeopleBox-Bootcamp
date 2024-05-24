<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "blogapp";

    $connection = mysqli_connect($server,$username,$password,$database);
    mysqli_set_charset($connection,"UTF8");
    if(mysqli_connect_errno() > 0){
        die("error: ".mysqli_connect_errno());
    }


?>