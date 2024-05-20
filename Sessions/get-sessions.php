<?php

    session_start();

    echo $_SESSION["username"];
    echo "<br>";
    echo $_SESSION["password"];

    print_r($_SESSION);

?>