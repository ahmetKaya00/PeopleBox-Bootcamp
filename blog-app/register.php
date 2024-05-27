<?php

    require "libs/vars.php";
    // require "libs/functions.php";  
    require "libs/ayar.php";

    $username = $email = $password = $confirm_password = "";
    $username_err = $email_err = $password_err = $confirm_password_err = "";

    if (isset($_POST["register"])) {

        if(empty(trim($_POST["username"]))){
            $username_err = "username girmelisiniz";
        }
        else if(strlen(trim($_POST["username"]))< 5 or strlen(trim($_POST["username"]))>15){
            $username_err = "username 5-15 karakter arasında olmalıdır.";
        }else if( !preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST["username"])){
            $username_err = "username sadece rakam,harf ve alt çizgilerden oluşmalıdır.";
        }
        else{
            $username = $_POST["username"];
        }
        if(empty(trim($_POST["email"]))){
            $email_err = "email girmelisiniz";
        }else if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_err = "geçerli bir email kullanınız.";
       }
        else{
            $email = $_POST["email"];
        }
        if(empty(trim($_POST["password"]))){
            $password_err = "password girmelisiniz";
        }else if(strlen($_POST["password"])<6){
            $password_err = "password min. 6 karakterden oluşturulmalıdır.";
        }
        else{
            $password = $_POST["password"];
        }
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "password tekrarı girmelisiniz";
        }else{
            $confirm_password = $_POST["confirm_password"];
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "parolalar eşleşmiyor.";
            }
        }

    }

?>

<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">

    <div class="row">

        <div class="col-12">
           
        <div class="card">
           
           <div class="card-body">

               <form action="register.php" method="POST" novalidate>

                <div class="mb-3">
                       <label for="username" class="form-label">username</label>
                       <input type="text" class="form-control <?php echo (!empty($username_err))?'is-invalid':''?>" value="<?php echo $username; ?>" name="username" id="username">
                       <span class="invalid-feedback"><?php echo $username_err?></span>
                   </div>

                   <div class="mb-3">
                       <label for="email" class="form-label">email</label>
                       <input type="text" class="form-control <?php echo (!empty($email_err))?'is-invalid':''?>" value="<?php echo $email; ?>"  name="email" id="email">
                       <span class="invalid-feedback"><?php echo $email_err?></span>

                   </div>      
                   <div class="mb-3">
                       <label for="password" class="form-label">password</label>
                       <input type="password" class="form-control <?php echo (!empty($password_err))?'is-invalid':''?>" value="<?php echo $password; ?>"  name="password" id="password">
                       <span class="invalid-feedback"><?php echo $password_err?></span>

                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">confirm_password</label>
                        <input type="text" class="form-control <?php echo (!empty($confirm_password_err))?'is-invalid':''?>" value="<?php echo $confirm_password; ?>"  name="confirm_password" id="confirm_password">
                        <span class="invalid-feedback"><?php echo $confirm_password_err?></span>

                    </div>

                   <input type="submit" name="register" value="Submit" class="btn btn-primary">
               
               </form>
           </div>
       </div>

        </div>    
    
    </div>

</div>

<?php include "views/_footer.php" ?>

