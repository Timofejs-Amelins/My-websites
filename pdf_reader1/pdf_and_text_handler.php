<?php
    // import functions and header
    include "includes/header.php";
    include "includes/pdf_functions.php";
    
    
    // wait until user submits PDF then read
    if(isset($_FILES["file"])) {

        $file_full_path = realpath($_FILES["file"]["tmp_name"]);
        read_pdf($file_full_path);
    }    
?>

<!--website title-->
<title>
    PDF Reader
</title>
</head>

<!--page heading-->
<h1>
    PDF Reader
</h1>

<!--user submits PDF and Bootstrap form design-->
<form action="pdf_and_text_handler.php" method="post" enctype="multipart/form-data">

    <!--PDF entry functionality and design-->
    <div class="mb-3">

        <!--PDF entry label text and design-->
        <label class="form-label"> 
            Select PDF to submit:
        </label>

        <br>

        <input type="file" name="file" class="form-control">
    </div>

    <!--submission button information and design-->    
    <button type="submit" class="btn btn-primary">
        Submit PDF
    </button>
</form>

<?php
    include "includes/footer.php";
?>    
