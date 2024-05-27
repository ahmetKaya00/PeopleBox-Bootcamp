<?php  

    $categoryId = "";
    $keyword ="";
    $page =1;

    if(isset($_GET["categoryId"]) && is_numeric($_GET["categoryId"])) $categoryId = $_GET["categoryId"];
    if(isset($_GET["q"])) $keyword = $_GET["q"];
    if(isset($_GET["page"])&&is_numeric($_GET["page"])) $page = $_GET["page"];

    $result = getBlogsFilters($categoryId,$keyword,$page);
?> 

    <?php if(mysqli_num_rows($result["data"]) > 0): ?>
        <?php while($film = mysqli_fetch_assoc($result["data"])):?> 
    <?php if($film["isActive"]):?>

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
<?php endif;?>
<?php endwhile; ?>

<?php else:?>
    <div class="alert alert-warning">
        Kategoriye ait film bulunmamaktadır.
    </div>
<?php endif;?>

<?php if($result["total_pages"]>1):?>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php for($x =1; $x <= $result["total_pages"]; $x++): ?>
        <li class="page-item <?php if($x == $page) echo "active"; ?>"><a href="
        <?php
         $url = "?page=".$x;

         if(!empty($categoryId)){
            $url .= "&categoryid=".$categoryId;
         }
         if(!empty($keyword)){
            $url .= "&q=".$keyword;
         }
         echo $url;
        ?>
        " class="page-link"><?php echo $x; ?></a></li>
        <?php endfor; ?>
    </ul>
</nav>

<?php endif;?>