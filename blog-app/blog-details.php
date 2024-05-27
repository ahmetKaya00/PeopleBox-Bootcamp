<?php

    require "libs/vars.php";
    require "libs/functions.php";  

    if(!isset($_GET["id"]) or !is_numeric($_GET["id"])) {
        header('Location: index.php');
    }

    $result = getBlogById($_GET["id"]);
    $blog = mysqli_fetch_assoc($result);

    if(!$blog) {
        header('Location: index.php');
    }

?>

<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">

    <div class="row">

        <div class="col-12">

            <div class="card p-1">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img class="img-fluid" src="img/<?php echo $blog["imageUrl"] ?>" alt="<?php echo $blog["title"] ?>">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h1 class="card-title"><?php echo $blog["title"] ?></h1>
                            <p class="card-text"><?php echo htmlspecialchars_decode($blog["short_description"]) ?></p>
                            <hr>
                            <p class="card-text"><?php echo htmlspecialchars_decode($blog["description"]) ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>    
    
    </div>

</div>

<?php include "views/_footer.php" ?>

