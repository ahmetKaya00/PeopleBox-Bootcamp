<?php
    require "libs/vars.php";
    require "libs/functions.php";  

    $title = $description = $category = "";
    $title_err = $description_err = $category_err = "";

    $categories = getCategories();

    if ($_SERVER["REQUEST_METHOD"]=="POST") {


        $input_title = trim($_POST["title"]);

        if(empty($input_title)){
            $title_err = "title boş geçilemez.";
        }else if(strlen($input_title) > 150){
            $title_err = "title için çok fazla karakter kullandınız. Max: 150kr";
        }else{
            $title = control_input($input_title);
        }


        $input_description = trim($_POST["description"]);

        if(empty($input_description)){
            $description_err = "description boş geçilemez.";
        }else if(strlen($input_description) < 10){
            $description_err = "description için çok az karakter kullandınız. Min: 11kr";
        }else{
            $description = control_input($input_description);
        }

        $select_category = $_POST["category"];

        if($select_category == "0"){
            $category_err = "Kategori seçmelisiniz.";
        }else{
            $category = $_POST["category"];
        }


        $image = $_POST["image"];
        $url = $_POST["url"];

        if(empty($title_err) && empty($description_err) && empty($category_err)){
            if( createBlog($title,$description,$image,$url,$category)){
                header('Location: index.php');
            }else{
                echo "Yükleme sırasında hata oluştu";
            }
        }  
    }
?>

<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">

    <div class="row">

        <div class="col-3">
            <?php include "views/_menu.php" ?>     
        </div>
        <div class="col-9">

           <div class="card">
           
                <div class="card-body">
                    <form action="blog-create.php" method="POST">

                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid':''?>" name="title" id="title" value="<?php echo $title?>">
                            <span class="invalid-feedback"><?php echo $title_err ?></span>
                            <span class="invalid-feedback"><?php echo $title_err ?></span>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea name="description" id="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid':''?>"></textarea>
                            <span class="invalid-feedback"><?php echo $description_err ?></span>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Resim</label>
                            <input type="text" class="form-control" name="image" id="image">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">url</label>
                            <input type="text" class="form-control" name="url" id="url">
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select <?php echo (!empty($category_err)) ? 'is-invalid':''?>">
                                <option selected value="0">Seçiniz</option>
                                <?php foreach($categories as $c){
                                    echo "<option value='{$c["id"]}'>{$c["name"]}</option>";
                            }
                                    ?>
                            </select>
                            <span class="invalid-feedback"><?php echo $category_err ?></span>
                            <script type="text/javascript">
                                document.getElementById("category").value = "<?php echo $category?>"
                            </script>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">

                    
                    </form>
                </div>
            </div>

        </div>    
    
    </div>

</div>

<?php include "views/_ckeditor.php" ?>
<?php include "views/_footer.php" ?>

