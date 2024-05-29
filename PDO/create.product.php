<?php
include 'classes/db.class.php';
include 'classes/product.class.php';
?>
<?php include('includes/header.php') ?>

<?php

    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        $product = new Products();

        if($product->createProduct($title,$description,$price)){
            header('location: index.php');
        }
    }
?>

<div class="container my-4">
    <div class="row">
        <form method="post">
            <div class="col-6">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>
                <button class="btn btn-success" type="submit" name="submit">Kaydet</button>
            </div>
        </form>
        </div>
    </div>
<?php include('includes/footer.php') ?>