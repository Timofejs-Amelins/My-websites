<?php include 'inc/header.php' ?>

<div class="feedback">
    <div class="row">
        <div class="col-12">
            <a href="feedback.php?id=-1">Add Task</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6"><strong>Task Title</strong></div>
        <div class="col-2"><strong>Description</strong></div>
        <div class="col-2"><strong>Status</strong></div>
        <div class="col-2"></div>
    </div>
    <?php
    require 'classes/feedback.php';


    $feedback = new Task();

    $rows = $feedback->GetFeedbackByUserID($data[0]['userId']);

    if ($rows) {
        foreach ($rows as $row) {
            echo "<div class='row'>
                        <div class='col-6'>" .
                $row["task_title"]
                . "</div>
                <div class='col-2'>" .
                $row["task_description"]
                .   "</div>
                        <div class='col-2'>" .
                $row["task_status"]
                .   "</div>
                        <div class='col-2'>
                            <a href='feedback.php?id=" . $row['task_id'] . "'>Update</a>
                            <a href='deleteFeedback.php?id=" . $row['task_id'] . "'>Delete</a>
                        </div>
                      </div>";
        }
    } else {
        echo "No data Found";
    }
    ?>

    <?php include 'inc/footer.php' ?>