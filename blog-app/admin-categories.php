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
                <a href="category-create.php" class="btn btn-primary">New Category</a>
            </div>
        </div>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 85px;">Id</th>
                        <th>Category Name</th>
                        <th style="width: 85px;">Is Active</th>
                        <th style="width: 140px;">Settings</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $result = getCategories(); while($item = mysqli_fetch_assoc($result)): ?>
                        <tr>

                            <td><?php echo $item["id"] ?></td>
                            <td><?php echo $item["name"] ?></td>
                            <td>
                                <?php if($item["isActive"]):?>
                                    <i class="fas fa-check"></i>
                                <?php else: ?>
                                    <i class="fas fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="category-edit.php?id=<?php echo $item["id"] ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="category-delete.php?id=<?php echo $item["id"] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    
    </div>

</div>

<?php include "views/_footer.php" ?>

