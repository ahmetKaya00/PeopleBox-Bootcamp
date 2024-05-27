<?php

    require "libs/vars.php";
    require "libs/functions.php";  

?>

<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">

    <div class="row">

        <div class="col-3">
            <?php include "views/_menu.php" ?>     

            
        </div>
        <div class="col-9">

         <?php $result =  getHomePageBlogs(); ?> 
            <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($film = mysqli_fetch_assoc($result)):?> 

<div class="card mb-3">
    <div class="row">
        <div class="col-3">
            <img class="img-fluid" src="img/<?php echo $film["image"]?>">                          
        </div>
        <div class="col-9">
            <div class="card-body">                        
                <h5 class="card-title"><a href="blog-details.php?id=<?php echo $film["id"]?>"><?php echo $film["title"]?></a></h5>
                <p class="card-text"><?php echo kisaAciklama($film['short_description'],200);?></p>
                
            </div>
        
        </div>
    </div>
</div>
<?php endwhile; ?>

<?php else:?>
    <div class="alert alert-warning">
        Kategoriye ait film bulunmamaktadır.
    </div>
<?php endif;?>

        </div>    
    
    </div>

</div>

<?php include "views/_footer.php" ?>

