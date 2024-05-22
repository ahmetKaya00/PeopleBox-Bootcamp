<?php

    require "libs/functions.php";

    $id = $_GET["id"];

    deleteBlog($id);

    header('Location: admin-blogs.php');


?>