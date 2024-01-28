<?php
$task_id = $_GET["id"];
echo "<br> id: ";
var_dump($task_id);
require 'classes/feedback.php';
$task = new Task();

var_dump($task);
$task->delete($task_id);
