<?php if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?php echo $_SESSION['type'];?> mb-0 text-center">
        <?php 
        
            echo $_SESSION['message']; 

            unset($_SESSION["message"]);
            unset($_SESSION["type"]);
        ?>    
    </div>

<?php endif;?>