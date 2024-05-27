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



function createBlog(string $title,string $sdescription, string $description, string $image,string $url, int $isActive=0) {
   include "ayar.php";

    $query = "INSERT INTO blogs(title,short_description,description,image,url,isActive) VALUES (?,?,?,?,?,?)";
    $result = mysqli_prepare($connection,$query);

    mysqli_stmt_bind_param($result, 'sssssi',$title,$sdescription,$description,$image,$url,$isActive);
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

function getBlogsFilters($categoryId,$keyword,$page){
    include "ayar.php";
    $pageCount = 2;
    $offset = ($page-1) * $pageCount;
    $query = "";

    if(!empty($categoryId)){
        $query = "SELECT * from blog_category bc inner join blogs b on bc.blog_id = b.id WHERE bc.category_id =$categoryId";
    }else{
        $query = "from blogs b WHERE b.isActive=1";
    }

    if(!empty($keyword)){
        $query .= "&& b.title LIKE '%$keyword%' or b.description LIKE '%$keyword%';";
    }


    $total_sql = "SELECT COUNT(*) ".$query;

    $count_data = mysqli_query($connection,$total_sql);
    $count = mysqli_fetch_array($count_data)[0];
    $total_pages = ceil($count / $pageCount);

    $sql = "SELECT * ".$query." LIMIT $offset, $pageCount";
    $result = mysqli_query($connection,$sql);
    mysqli_close($connection);
    return array(
        "total_pages" => $total_pages,
        "data" => $result
    );
}

function getHomePageBlogs(){
    include "ayar.php";

    $query = "SELECT * FROM blogs where isActive=1 and isHome=1 ORDER BY dateAdded DESC LIMIT 3";
    $result = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $result;
}

function editBlog(int $id,string $title,string $sdescription,string $description,string $image,string $url, int $isActive,int $isHome){
    include "ayar.php";
 
    $query = "UPDATE blogs SET title='$title',short_description = '$sdescription',description='$description',image='$image',url='$url',isActive='$isActive', isHome = '$isHome' WHERE id='$id'";
    $result = mysqli_query($connection,$query);
    echo mysqli_error($connection);
    return $result;
 }
 
 function clearBlogCategories(int $blogid){
    include "ayar.php";
 
    $query = "DELETE FROM blog_category WHERE blog_id=$blogid";
    $result = mysqli_query($connection, $query);
    echo mysqli_error($connection);
    return $result;
}

function addBlogToCategories(int $blogid, array $categories){
    include "ayar.php";
 
    foreach($categories as $catid){
        $query = "INSERT INTO blog_category(blog_id, category_id) VALUES (?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 'ii', $blogid, $catid);
        $result = mysqli_stmt_execute($stmt);
        
        if (!$result) {
            echo "Error: " . mysqli_error($connection) . "\n";
            return false;
        }
        
        mysqli_stmt_close($stmt);
    }
    return true;
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
 function getBlogsCategoryID(int $id){
    include "ayar.php";
 
     $query = "SELECT * from blog_category bc inner join blogs b on bc.blog_id = b.id where bc.category_id=$id";
     $result = mysqli_query($connection,$query);
     mysqli_close($connection);
     return $result;
 }

 function getBlogsByKeyword($q){
    include "ayar.php";
 
     $query = "SELECT * from blogs where title LIKE '%$q%' or description LIKE '%$q%'";
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