<?php

    

    //  $_SESSION["username"] = "ahmetkaya";
    //  $_SESSION["password"] = "1234";

    session_unset();
    session_destroy();

    ini_set('session.gc_maclifetime',1800);
    session_start();

    session_regenerate_id(true);
    unset($_SESSION["username"]);

    if(isset($_SESSION["username"])){
        echo $_SESSION["username"];
    }else{
        echo "username yok";
    }

    echo "<br>";
    echo $_SESSION["password"];



?>