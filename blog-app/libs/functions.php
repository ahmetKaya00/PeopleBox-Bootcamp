<?php

function getData(){
    $myfile = fopen("db.json","r");
    $size = filesize("db.json");

    $result = json_decode(fread($myfile, $size), true);
    fclose($myfile);

    return $result;
}
 function createUser(string $name,string $username,string $email,string $password){
    $db = getData();

    array_push($db["users"], array(
        "id" => count($db["users"]) + 1,
        "username" => $username,
        "password" => $password,
        "name" => $name,
        "email" => $email
    ));

    $myfile = fopen("db.json","w");
    fwrite($myfile, json_encode($db, JSON_PRETTY_PRINT));
    fclose($myfile);

 }

function getUser(string $username){
    $users = getData()["users"];

    foreach($users as $user){
        if($user["username"] == $username){
            return $user;
        }
    }
    return null;
}



function createBlog(string $title, string $description, string $image,string $url,int $category, int $isActive=0) {
   include "ayar.php";

    $query = "INSERT INTO blogs(title,description,image,url,category_id,isActive) VALUES (?,?,?,?,?,?)";
    $result = mysqli_prepare($connection,$query);

    mysqli_stmt_bind_param($result, 'ssssii',$title,$description,$image,$url,$category,$isActive);
    mysqli_stmt_execute($result);
    mysqli_stmt_close($result);
    mysqli_close($connection);

   return $result;
}


function getBlogs(){
    include "ayar.php";

    $query = "SELECT * FROM blogs";
    $result = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $result;
}

function editBlog(int $id,string $title,string $description,string $image,string $url, int $isActive){
    include "ayar.php";
 
    $query = "UPDATE blogs SET title='$title',description='$description',image='$image',url='$url',isActive='$isActive' WHERE id='$id'";
    $result = mysqli_query($connection,$query);
    echo mysqli_error($connection);
    return $result;
 }
 
 function clearBlogCategories(int $blogid){
    include "ayar.php";
 
    $query = "DELETE FROM blogs where id=$blogid";
    $result = mysqli_query($connection,$query);
    echo mysqli_error($connection);
    return $result;
 }

 function addBlogToCategories(int $blogid, array $categories){
    include "ayar.php";
 
    $query = "";
    foreach($categories as $catid){
        $query .= "INSERT INTO blog_category(blog_id,category_id) VALUES ($blogid,$catid); ";
    }
    $result = mysqli_multi_query($connection,$query);
    echo mysqli_error($connection);
    return $result;
 }


 function deleteBlog(int $id){
    include "ayar.php";
 
    $query = "DELETE from blogs WHERE id=$id";
    $result = mysqli_query($connection,$query);
    return $result;
 }
 
 function getBlogByID(int $id){
     include "ayar.php";
 
     $query = "SELECT * from blogs WHERE id='$id'";
     $result = mysqli_query($connection,$query);
     mysqli_close($connection);
     return $result;
 
 }

 function getCategoryBlogByID(int $id){
    include "ayar.php";
 
     $query = "SELECT c.id, c.name from blog_category bc inner join categories c on bc.category_id = c.id where bc.blog_id=$id";
     $result = mysqli_query($connection,$query);
     mysqli_close($connection);
     return $result;
 }

function getCategories(){
    include "ayar.php";

    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $result;
}

function createCategory(string $categoryname) {
    include "ayar.php";
 
     $query = "INSERT INTO categories(name) VALUES (?)";
     $result = mysqli_prepare($connection,$query);
 
     mysqli_stmt_bind_param($result, 's',$categoryname);
     mysqli_stmt_execute($result);
     mysqli_stmt_close($result);
     mysqli_close($connection);
 
    return $result;
 }

 function getCategoryByID(int $id){
    include "ayar.php";

    $query = "SELECT * from categories WHERE id='$id'";
    $result = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $result;

}

function editCategory(int $id,string $categoryname,int $isActive){
    include "ayar.php";
 
    $query = "UPDATE categories SET name='$categoryname',isActive='$isActive' WHERE id='$id'";
    $result = mysqli_query($connection,$query);
    echo mysqli_error($connection);
    return $result;
 }

 function deleteCategory(int $id){
    include "ayar.php";
 
    $query = "DELETE from categories WHERE id=$id";
    $result = mysqli_query($connection,$query);
    return $result;
 }



function control_input($data){
    $data = htmlspecialchars($data);
    $data = stripslashes($data);

    return $data;
}

function kisaAciklama($aciklama, $limit) {
    if (strlen($aciklama) > $limit) {
        echo substr($aciklama,0,$limit)."...";
    } else {
        echo $aciklama;
    };
}
?>