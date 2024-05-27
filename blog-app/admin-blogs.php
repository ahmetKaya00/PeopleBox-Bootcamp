<?php

    require "libs/vars.php";
    require "libs/functions.php";  

?>

<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">

    <div class="row">

        <div class="col-12">

        <div class="card mb-1">
            <div class="card-body">
                <a href="blog-create.php" class="btn btn-primary">New Blog</a>
            </div>
        </div>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 85px;">Image</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Category</th>
                        <th style="width: 85px;">Is Active</th>
                        <th style="width: 85px;">Is Home</th>
                        <th style="width: 140px;">Settings</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $result = getBlogs(); while($movie = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>
                                <img src="img/<?php echo $movie["image"]?>" alt="" class="img-fluid">
                            </td>
                            <td><?php echo $movie["title"] ?></td>
                            <td><?php echo $movie["url"] ?></td>
                            <td>


                                <?php 
                                echo "<ul>";

                                    $sonuc = getCategoryBlogByID($movie["id"]);

                                    if(mysqli_num_rows($sonuc)>0){
                                        while($category = mysqli_fetch_assoc($sonuc)){
                                            echo "<li>".$category["name"]."</li>";
                                        }
                                    }else{
                                        echo "<li>kategori seçilmedi.</li>";
                                    }

                                    echo "</ul>";
                                ?>


                            </td>
                            <td>
                                <?php if($movie["isActive"]):?>
                                    <i class="fas fa-check"></i>
                                <?php else: ?>
                                    <i class="fas fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($movie["isHome"]):?>
                                    <i class="fas fa-check"></i>
                                <?php else: ?>
                                    <i class="fas fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="blog-edit.php?id=<?php echo $movie["id"] ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="blog-delete.php?id=<?php echo $movie["id"] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    
    </div>

</div>

<?php include "views/_footer.php" ?>

