<?php

class Task {
    // set all attributes for Task class, make attributes private
    private $task_id;
    private $title;
    private $description;
    private $status;
    private $user_id;

    // property methods for getting and setting different attributes
    public function get_task_id() {
        return $this->task_id;
    }

    public function set_task_id($task_id) {
        $this->task_id = $task_id;
    }

    public function get_title() {
        return $this->title;
    }

    public function set_title($title) {
        $this->title = $title;
    }

    public function get_description() {
        return $this->description;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function get_status() {
        return $this->description;
    }

    public function set_status($status) {
        $this->status = $status;
    }

    public function get_user_id() {
        return $this->user_id;
    }

    public function set_user_id($user_id) {
        $this->user_id = $user_id;
    }


    public function add() {
        // use the connection
        $pdo = require $_SERVER["DOCUMENT_ROOT"] . "/config/connect.php";

        // create the query
        $sql = "INSERT INTO tasks 
                (task_title, task_description, task_status, user_id) 
                VALUES
                (:task_title, :task_description, :task_status, :user_id)";

        // get pdo to prepare the statement for adding the parameters
        $stmt = $pdo->prepare($sql);

        // bind the parameters with the values
        $stmt->bindparam(":task_title", $this->title);
        $stmt->bindparam(":task_description", $this->description);
        $stmt->bindparam(":task_status", $this->status);
        $stmt->bindparam(":user_id", $this->user_id);

        // execute the query
        $stmt->execute();

        // return the generated id
        return $pdo->lastInsertId();
    }

    public function Update() {
        // use the connection
        $pdo = require $_SERVER["DOCUMENT_ROOT"] . "/config/connect.php";

        // create the query
        $sql = "UPDATE tasks 
                SET task_title = :task_title,
                task_description = :task_description,
                task_status = :task_status
                WHERE task_id = :task_id";

        // get pdo to prepare the statement for adding the parameters
        $stmt = $pdo->prepare($sql);

        // bind the parameters with the values
        $stmt->bindparam(":task_title", $this->title);
        $stmt->bindparam(":task_description", $this->description);
        $stmt->bindparam(":task_status", $this->status);
        $stmt->bindparam(":task_id", $this->task_id);

        // execute the query
        $stmt->execute();
    }

    public function GetAll() {
        // use the connection created on connect.php
        define("PDO", require $_SERVER["DOCUMENT_ROOT"] . "/config/connect.php");
        // create the query
        define("SQL", "SELECT tasks.task_title, tasks.task_status, users.firstName, users.lastName FROM tasks, users WHERE tasks.user_id = users.user_id";

        // run the query
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Gettask_byuser_id($user_id) {
        // use the connection
        $pdo = require $_SERVER["DOCUMENT_ROOT"] . "/config/connect.php";

        // create the query
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id";

        // run the query
        $stmt = $pdo->prepare($sql);

        $stmt->bindparam(":user_id", $user_id);

        $stmt->execute();

        // Get all task_i        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Gettask_iyId($id) {
        // use the connection
        $pdo = require $_SERVER["DOCUMENT_ROOT"] . "/config/connect.php";

        // create the query
        $sql = "SELECT * FROM users WHERE user_id = :id";

        // run the query
        $stmt = $pdo->prepare($sql);

        $stmt->bindparam(":id", $id);

        $stmt->execute();

        // Get all task_i        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($task_id) {
        $pdo = require $_SERVER["DOCUMENT_ROOT"] . "/config/connect.php";

        // create the query
        $sql = "DELETE FROM tasks WHERE task_id = :task_id";

        // run the query
        $stmt = $pdo->prepare($sql);

        $stmt->bindparam(":task_id", $task_id);

        $stmt->execute();

        header("Location: ../task_iata.php");
    }
}
