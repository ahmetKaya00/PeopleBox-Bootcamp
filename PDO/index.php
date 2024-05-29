<?php
include 'classes/db.class.php';
include 'classes/product.class.php';
?>
<?php include('includes/header.php') ?>
<?php $product = new Products(); ?>
<?php if ($product->getProduct()) : ?>

    <?php include('includes/product-list.php') ?>

<?php else : ?>
    <?php include('includes/no-product.php') ?>
<?php endif; ?>
</div>
<?php include('includes/footer.php') ?>