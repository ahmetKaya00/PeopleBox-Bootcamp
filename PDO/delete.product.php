<?php
include 'classes/db.class.php';
include 'classes/product.class.php';
?>
<?php include('includes/header.php') ?>

<?php
$product = new Products();

    if(isset($_POST["deleteProduct"])){
        $id = $_POST["productId"];
        if($product->deleteProduct($id)){
            header('location: index.php');
        }
    }
?>
 
<?php include('includes/footer.php') ?>