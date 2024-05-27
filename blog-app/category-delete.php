<?php

    require "libs/vars.php";
    require "libs/functions.php";

    $id = $_GET["id"];

    if (deleteCategory($id)) {
        $_SESSION['message'] = $id." id numaralı kategori silindi.";
        $_SESSION['type'] = "danger";
    
        header('Location: admin-categories.php');
    } else {
        echo "hata";
    } 



?>