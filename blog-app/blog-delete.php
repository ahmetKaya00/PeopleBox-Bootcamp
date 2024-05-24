<?php

    require "libs/functions.php";

    $id = $_GET["id"];

   if(deleteBlog($id)){
       header('Location: admin-blogs.php');
   }else{
    echo "Silme aşamasında bir hata oldu";
   }



?>