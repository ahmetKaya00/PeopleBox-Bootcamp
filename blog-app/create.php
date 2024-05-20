<?php
        require "libs/vars.php";
        require "libs/function.php";

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $baslik = $_POST["baslik"];
            $aciklama = $_POST["aciklama"];
            $resimurl = $_POST["resimurl"];
            $url = $_POST["url"];

            filmEkle($baslik,$aciklama,$resimurl,$url);
            header('Location: index.php');
        }
?>
    <?php include "views/_header.php";?>
    <?php include "views/_navbar.php";?>    
    
    <div class="container my-5">
    
        <div class="row">

            <div class="col-3">
            <?php include "views/_menu.php";?>
            </div>
            <div class="col-9">
            
            <div class="card">
                <div class="card-body">
                    <form action="create.php" method="POST">
                        <div class="mb-3">
                            <label for="baslik" class="form-label">Başlık</label>
                            <input type="text" class="form-control" name="baslik" id="baslik">
                        </div>
                        <div class="mb-3">
                            <label for="aciklama" class="form-label">Açıklama</label>
                            <textarea name="aciklama" id="aciklama" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="resimurl" class="form-label">Resim</label>
                            <input type="text" class="form-control" name="resimurl" id="resimurl">
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Resim</label>
                            <input type="text" class="form-control" name="url" id="url">
                        </div>

                        <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
            
            </div>       
        </div>    
    </div>

    <?php include "views/_footer.php"?>
</body>
</html>