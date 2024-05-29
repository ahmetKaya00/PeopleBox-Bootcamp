<div class="container my-4">
            <a href="create.product.php" class="btn btn-success">Create Product</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 50px;">Id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th style="width: 180px;">Settings</th>
                    </tr>
                </thead>
                <?php foreach($product->getProduct() as $item):?>
                    <tr>
                        <td><?php echo $item->id?></td>
                        <td><?php echo $item->title?></td>
                        <td><?php echo $item->price?></td>
                        <td><?php echo $item->description?></td>
                        <td>
                            <a href="edit.product.php?id=<?php echo $item->id?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="delete.product.php" method="post">
                                <input type="hidden" name="productId" value="<?php echo $item->id?>">
                                <button class="btn btn-danger btn-sm" type="submit" name="deleteProduct">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>