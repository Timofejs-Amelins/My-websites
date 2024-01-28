<?php 
    include "inc/header.php"; // add the header 
?>
<?php // query and print the blog data
    require "config/database.php";
    $page = 1;
    $start = 0;
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        $start = ($page - 1) * 10;
    }
    $sql = "SELECT * FROM blogs
    ORDER BY release_date DESC 
    LIMIT 10 
    offset $start";
    $blogs = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($blogs)) {
        getUserName($row["user_id"],$conn);
        echo "<div>0
            " . $row['blog_title'] . " by ". $row['user_id']."
        </div>
        <div>
            " . $row['blog_content'] . "
        </div>
        <div>
            " . $row['blog_title'] . "
        </div>";
    }


function getUserName($id,$conn)
{
    $query = mysqli_query($conn, "SELECT first_name FROM users WHERE user_id = $id");
    $result = mysqli_fetch_assoc($query);
    var_dump($result);
}    




    include "inc/footer.php"; // add the footer 
?> 