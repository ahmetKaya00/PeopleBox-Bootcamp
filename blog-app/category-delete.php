<?php

    require "libs/functions.php";

    $id = $_GET["id"];

   if(deleteCategory($id)){
       header('Location: admin-categories.php');
   }else{
    echo "Silme aşamasında bir hata oldu";
   }



?>