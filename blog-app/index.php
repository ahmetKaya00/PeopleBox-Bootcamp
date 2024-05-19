<?php
        require "libs/vars.php";
        require "libs/function.php";


        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $baslik = $_POST["baslik"];
            $aciklama = $_POST["aciklama"];
            $resimurl = $_POST["resimurl"];

            filmEkle($filmler,$baslik,$aciklama,$resimurl);
        }


?>
    <?php include "views/_header.php";?>
    <?php include "views/_navbar.php";?>    
    
    <div class="container my-5">
    
        <div class="row">
        <?php include "views/_title.php";?>
            <div class="col-3">
            <?php include "views/_menu.php";?>
            </div>
            <div class="col-9">
            <?php include "views/_blog-list.php";?>
            </div>       
        </div>    
    </div>

    <?php include "views/_footer.php"?>
</body>
</html>