<?php  foreach(getData()["movies"] as $id => $film): ?> 

    <?php if($film["is-active"]):?>

<div class="card mb-3">
    <div class="row">
        <div class="col-3">
            <img class="img-fluid" src="img/<?php echo $film["image"]?>">                          
        </div>
        <div class="col-9">
            <div class="card-body">                        
                <h5 class="card-title"><a href="<?php echo $film["url"]?>"><?php echo $film["title"]?></a></h5>
                <p class="card-text"><?php echo kisaAciklama($film['description'],200);?></p>
                <div>
                    <?php if($film["comments"] > 0): ?>  
                        <span class="badge bg-primary me-1"><?php echo $film["comments"]?> yorum</span>
                    <?php endif; ?>
                    <?php if($film["likes"] > 0): ?>  
                    <span class="badge bg-primary me-1"><?php echo $film["likes"]?> beğeni</span>
                    <?php endif; ?>
                </div>
            </div>
        
        </div>
    </div>
</div>
<?php endif;?>
<?php endforeach; ?>