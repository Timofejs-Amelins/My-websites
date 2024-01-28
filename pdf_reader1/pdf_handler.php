<?php
// import functions and header
include "includes/header.php";
include "includes/pdf_functions.php";
$file = $_FILES["file"];
var_dump($file);
// wait until user submits PDF then check and read

// if (isset($file) && check_pdf()) {
//     read_pdf();
// }
?>

<!--website title-->
<title>
    PDF Handler
</title>
</head>

<!--page heading-->
<h1>
    PDF Handler
</h1>

<!--user submits PDF and Bootstrap form design-->
<form action="pdf_handler.php" method="post" enctype="multipart/form-data">

    <!--PDF entry functionality and design-->
    <div class="mb-3">

        <!--PDF entry label text and design-->
        <label class="form-label">
            Select PDF to submit:
        </label>
        <?php
        // display error if file is not a PDF

        if (isset($file) && !check_pdf()) {
        ?>
            <input type="file" name="file" class="form-control is-invalid" required>

            <div class="invalid-feedback">
                Error: File is not a PDF
            </div>
        <?php
        } else {
            // remove feedback if the PDF is valid
        ?>
            <input type="file" name="file" class="form-control" required>
        <?php
        }
        ?>
    </div>

    <!--submission button information and design-->
    <button type="submit" class="btn btn-primary">
        Submit PDF
    </button>
</form>

<?php
// upload and read PDF if file is PDF
if (isset($_FILES["file"]) && check_pdf()) {
    // set file properties and temporary name to variable
    $file = $_FILES["file"];
    $temporary_name = $file["tmp_name"];
    var_dump($file);
    // upload and read PDF
    // $a = move_uploaded_file($temporary_name, "uploads/" . $file["name"]);
    // var_dump($a);
    // $path = "uploads/" . $_FILES["file"]["name"];
    // read_pdf();
}
include "includes/footer.php";
?>