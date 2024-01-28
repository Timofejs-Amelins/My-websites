<?php
    // make user login if not logged in
    if (count($_COOKIE) == 0) {
        header("Location: login.php");
    }
    require "config/database.php";
    $id = ""; 
    $title = ""; 
    $content = "";
    // When Page Loads
    if($_GET["id"]  == "-1") {
        // Add logic
        $id = "-1";
    } else {
        $id = $_GET["id"];
        $sql = "SELECT * FROM blogs WHERE blog_id = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $title = $row["blog_title"];
            $content = $row["blog_content"];
        }
    }
    // Submit blog title, content, user ID, release date and image link to database
    if(isset($_POST["btnSave"])) {
        $blog_title = $_POST["txtBlogTitle"];
        $blog_content = $_POST["txtBlogContent"];
        $user_id = 6;
        $release_date = date("Y-m-d");
        $image_link = null;
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
            } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
            }
        }
        // Check if file already exists
        if(file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }   

        // Check if $uploadOk is set to 0 by an error
        if($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
                if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    $image_link = $target_file;
                } else {
                        echo "Sorry, there was an error uploading your file.";
                }
        }
        if($_GET["id"] == "-1") {
            // Add logic
            $sql = "INSERT INTO blogs (blog_title, blog_content, release_date, image_link, user_id) 
            VALUES ('$blog_title', '$blog_content', '$release_date', '$image_link', $user_id)"; 
            $result = mysqli_query($conn, $sql);
        } else {
            // Edit logic
            $sql = 
            "UPDATE blogs 
            SET blog_title = '$blog_title', 
            blog_content = '$blog_content', 
            image_link = '$image_link' 
            WHERE blog_id = $id";
            $result = mysqli_query($conn, $sql);
        }
        header("Location: blogs.php");
    }
    
?>

<?php
    include "inc/header.php"; // add the header
?> 

<form action="" method="POST" enctype="multipart/form-data"> <!--makes new blogs and edits existing blogs-->
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            Blog ID
        </span>

        <input type="text" class="form-control" placeholder="Blog ID" aria-label="txtBlogId" aria-describedby="basic-addon1" name="txtFirstName" required disabled value="<?php 
            echo $id; 
        ?>">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            Blog Title
        </span>

        <input type="text" class="form-control" placeholder="Blog Title" aria-label="blogTitle" aria-describedby="basic-addon1" name="txtBlogTitle" required value=
        "<?php 
            echo $title; 
        ?>">
    </div>

    <div class="input_group mb-3">
        <span class="input-group-text" id="basic-addon1">
            Blog Content
        </span>

        <textarea class="form-control" style="height:400px;width:100%;" name="txtBlogContent">
            <?php
                echo $content
            ?>    
        </textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            Image
        </span>

        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
    </div>

    <div>
        <input type="submit" class="btn btn-primary" value="Save" name="btnSave"/>
    </div> 
</form>

<script type="text/javascript" src='https://cdn.tiny.cloud/1/jpbai99otcu9bethnnug6xecwy6q7ic9re3h33mwnmhn7sxo/tinymce/6/tinymce.min.js' referrerpolicy="origin"> // imports timymce functionality

</script> 

<script> // allows user to format blog content text
    tinymce.init({
        selector: 'textarea'
    }) 
</script> 

<?php 
    include "inc/footer.php"; // add the footer 
?> 