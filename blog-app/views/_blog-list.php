<?php  

if(isset($_GET["categoryid"])&&is_numeric($_GET["categoryid"])){
    $result = getBlogsCategoryID($_GET["categoryid"]);
    
}else if(isset($_GET["q"])){
    $result = getBlogsByKeyword($_GET["q"]);
}
else{
    $result = getBlogs();
}
?> 

    <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($film = mysqli_fetch_assoc($result)):?> 
    <?php if($film["isActive"]):?>

<div class="card mb-3">
    <div class="row">
        <div class="col-3">
            <img class="img-fluid" src="img/<?php echo $film["image"]?>">                          
        </div>
        <div class="col-9">
            <div class="card-body">                        
                <h5 class="card-title"><a href="blog-details.php?id=<?php echo $film["id"]?>"><?php echo $film["title"]?></a></h5>
                <p class="card-text"><?php echo kisaAciklama($film['description'],200);?></p>
                
            </div>
        
        </div>
    </div>
</div>
<?php endif;?>
<?php endwhile; ?>

<?php else:?>
    <div class="alert alert-warning">
        Kategoriye ait film bulunmamaktadır.
    </div>
<?php endif;?>