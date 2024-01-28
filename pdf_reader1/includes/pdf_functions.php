<?php
// read PDF function
function read_pdf()
{
    // set the path to the file
    $path = basename("..uploads/" . $_FILES["file"]["name"]);
    // direct user to PDF reader
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=${path}");
    // read the file
    @readfile($path);
}

// handle non-PDF files
function check_pdf()
{
    // if file is not a PDF
    if ($_FILES["file"]["type"] != "application/pdf") {
        return false;
    }
    return true;
}

function upload_pdf($args): void
{
    # code...
}
