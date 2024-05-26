<ul class="list-group">
<?php  $result = getCategories(); while($item = mysqli_fetch_assoc($result)): ?> 

    <?php if($item["isActive"]):?>

        <a href='<?php echo "movies/".$item["id"]?>' class="list-group-item list-group-item-action">
            <?php echo ucfirst($item["name"])?>
        </a>

        <?php endif; ?>
        <?php endwhile; ?>
</ul>