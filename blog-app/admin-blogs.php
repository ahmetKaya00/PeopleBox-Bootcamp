<?php

    require "libs/vars.php";
    require "libs/functions.php";  
    if(!isAdmin()){
        header("location: index.php");
        exit;
    }

?>

<?php include "views/_header.php" ?>
<?php include "views/_message.php" ?>
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
                        <th style="width: 80px;">Image</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Category</th>
                        <th style="width: 100px;">is active</th>
                        <th style="width: 100px;">is home</th>
                        <th style="width: 130px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $result = getBlogs();  while($film = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>
                                <img src="img/<?php echo $film["image"]?>" alt="" class="img-fluid">
                            </td>
                            <td><?php echo $film["title"]?></td>
                            <td><?php echo $film["url"]?></td>
                            <td>
                                
                                <?php 
                                    echo "<ul>";

                                        $sonuc = getCategoriesByBlogId($film["id"]);

                                        if (mysqli_num_rows($sonuc) > 0) {
                                            while($category = mysqli_fetch_assoc($sonuc)) {
                                                echo "<li>".$category["name"]."</li>";
                                            }
                                        } else {
                                            echo "<li>kategori seçilmedi.</li>";
                                        }

                                    echo "</ul>";                                
                                ?>              
                            
                            </td>
                            <td>
                                <?php if($film["isActive"]): ?>
                                    <i class="fas fa-check"></i>
                                <?php else: ?>
                                    <i class="fas fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($film["isHome"]): ?>
                                    <i class="fas fa-check"></i>
                                <?php else: ?>
                                    <i class="fas fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="blog-edit.php?id=<?php echo $film["id"]?>">edit</a>
                                <a class="btn btn-danger btn-sm" href="blog-delete.php?id=<?php echo $film["id"]?>">delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            

        </div>    
    
    </div>

</div>

<?php include "views/_footer.php" ?>

