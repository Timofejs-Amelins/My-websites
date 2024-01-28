<?php include 'inc/header.php' ?>

<?php
if (!isset($_GET['id'])) {
    header("Location:feedbackData.php");
}
require 'classes/feedback.php';
$task_title = "";
$task_description = "";
$task_status = "";
$user_id = $data[0]['user_id'];


if ($_GET['id'] == -1) {
    $id = -1;
} else {
    $id = $_GET['id'];

    $feedback = new Task();
}

if (isset($_POST['btnSave'])) {
    echo "<br> Post btnSave: <br>";
    var_dump($_POST['btnSave']);
    if ($_GET['id'] == -1) {


        $feedback = new Task();
        $feedback->Set_title($_POST['txt_title']);
        $feedback->Set_description($_POST['txt_description']);
        $feedback->Set_status($_POST['txt_status']);
        $feedback->set_user_id($_POST['txtuser_id']);
        try {
            $primaryKey = $feedback->Add();
        } catch (Exception $ex) {
            echo "Error Occurred. Failed to Add Feedback";
        }
    } else {
        $feedback = new Task();

        $feedback->Set_title($_POST['txt_title']);
        $feedback->Set_description($_POST['txt_description']);
        $feedback->set_task_id($id);
        $feedback->Set_status($_POST['txt_status']);
        $feedback->set_user_id($_POST['txtuser_id']);

        try {
            $feedback->Update();
        } catch (Exception $ex) {
            echo "Error Occurred. Failed to Update Feedback";
        }
    }
}

?>



<form action="" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">ID</span>
        <input type="text" class="form-control" placeholder="ID" aria-label="Id" aria-describedby="basic-addon1" name="txtId" required disabled value="<?php echo $id; ?>">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Title</span>
        <input type="text" class="form-control" placeholder="" aria-label="rating" aria-describedby="basic-addon1" name="txt_title" required value="<?php echo $task_title; ?>">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Description</span>
        <textarea type="text" class="form-control" name="txt_description" id="txt_description" style="height:200px;"><?php echo $task_description ?></textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Status</span>
        <input type="text" class="form-control" placeholder="Status" aria-label="userIUd" aria-describedby="basic-addon1" name="txt_status" required value="<?php echo $task_status; ?>">
    </div>

    <div class="input-group mb-3 hidden">
        <span class="input-group-text" id="basic-addon1"></span>
        <input type="text" class="form-control" placeholder="user_id" aria-label="userIUd" aria-describedby="basic-addon1" name="txtuser_id" required value="<?php echo $user_id; ?>">
    </div>

    <div>
        <input type="submit" class="btn btn-primary" value="Save" name="btnSave" />
    </div>
</form>

<?php include 'inc/footer.php' ?>