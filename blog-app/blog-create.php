<?php
    require "libs/vars.php";
    require "libs/functions.php";  

    $title = $description = $category =  $image ="";
    $title_err = $description_err = $category_err = $image_err="";

    $categories = getCategories();

    if ($_SERVER["REQUEST_METHOD"]=="POST") {

        // validate title

        $input_title = trim($_POST["title"]);

        if(empty($input_title)) {
            $title_err = "title boş geçilemez.";
        } else if (strlen($input_title) > 150) {
            $title_err = "title için çok fazla karakter girdiniz.";
        }
        else {
            $title = control_input($input_title);
        }

        // validate description

        $input_description = trim($_POST["description"]);

        if(empty($input_description)) {
            $description_err = "description boş geçilemez.";
        } else if (strlen($input_description) < 10) {
            $description_err = "description için çok az karakter girdiniz.";
        }
        else {
            $description = control_input($input_description);
        }

        if(empty($_FILES["image"]["name"])){
            $image_err = "dosya seçiniz.";
        }else{
            $result = saveImage($_FILES["image"]);
            if($result["isSuccess"]==0){
                $image_err = $result["message"];
            }else{
                $image = $result["image"];
            }
        }

        $sdescription = $_POST["sdescription"];
        $url = $_POST["url"];

        if(empty($title_err) && empty($description_err)) {
            if (createBlog($title,$sdescription , $description, $image, $url)) {
                $_SESSION['message'] = $title." isimli blog eklendi";
                $_SESSION['type'] = "success";
                
                header('Location: admin-blogs.php');
            } else {
                echo "hata";
            }
        }      
     
    }
?>

<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">

    <div class="row">
        
        <div class="col-12">

           <div class="card">
           
                <div class="card-body">
                    <form action="blog-create.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="title" class="form-label">title</label>
                            <input type="text" name="title" id="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid':'' ?>" value="<?php echo $title;?>">
                            <span class="invalid-feedback"><?php echo $title_err?></span>
                        </div>

                        <div class="mb-3">
                            <label for="sdescription" class="form-label">short description</label>
                            <textarea name="sdescription" id="sdescription" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">description</label>
                            <textarea name="description" id="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid':'' ?>"><?php echo $description;?></textarea>
                            <span class="invalid-feedback"><?php echo $description_err?></span>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">image</label>
                            <input type="file" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid':'' ?>" name="image" id="image">
                            <span class="invalid-feedback"><?php echo $image_err?></span>
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">url</label>
                            <input type="text" class="form-control" name="url" id="url">
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

