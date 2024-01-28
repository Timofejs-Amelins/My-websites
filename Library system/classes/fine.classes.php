<?php

// read data from the fine database
class Fine extends DatabaseConnection {

    // give the fine properties
    private $fine_id;
    private $fine_name;

    // create a new fine class
    public function __construct($fine_id) {
        // connect to database
        parent::__construct("mysql:host=localhost;dbname=library", "brad", "localhost");

        // set fine id and name by checking fine id and seeing what that returns
        $this->set_fine_name();
    }

    // fine id property
    private function set_fine_id($fine_id) {
        $this->fine_id = $fine_id;
    }

    // set the fine ID and name
    private function set_fine_name() {
        // check fine ID before logging in
        $connection = $this->connect();
        // we are using prepared statements for security, hence the :
        $statement = "SELECT * from fine WHERE fine_id = :fine_id";
        // prepare and execute the statement
        $prepared_statement = $connection->prepare($statement);
        $prepared_statement->bindParam(":fine_id", $this->fine_id);
        $prepared_statement->execute();
        // set the properties based on what php finds in fine database
        $result = $prepared_statement->fetch(PDO::FETCH_ASSOC);
        $this->fine_name = $result["fine_name"];
    }
}
