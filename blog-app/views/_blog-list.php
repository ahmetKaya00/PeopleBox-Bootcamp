<?php  foreach(filmleriGetir() as $id => $film): ?> 

<div class="card mb-3">
    <div class="row">
        <div class="col-3">
            <img class="img-fluid" src="img/<?php echo $film["resim"]?>">                          
        </div>
        <div class="col-9">
            <div class="card-body">                        
                <h5 class="card-title"><a href="<?php echo $film["url"]?>"><?php echo $film["baslik"]?></a></h5>
                <p class="card-text"><?php echo kisaAciklama($film['aciklama'],200);?></p>
                <div>
                    <?php if($film["yorumSayisi"] > 0): ?>  
                        <span class="badge bg-primary me-1"><?php echo $film["yorumSayisi"]?> yorum</span>
                    <?php endif; ?>

                    <span class="badge bg-primary me-1"><?php echo $film["begeniSayisi"]?> beğeni</span>

                    <span class="badge bg-warning me-1">                                            
                        <?php if ($film["vizyon"]): ?>
                            <span>vizyonda</span>
                        <?php else: ?>
                            <span>vizyonda değil</span>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        
        </div>
    </div>
</div>

<?php endforeach; ?>