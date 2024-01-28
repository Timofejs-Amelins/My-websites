<?php
// include the database functionality
include "dbh.classes.php";

// reads data from member database
class Member extends DatabaseConnection {
    // give the member properties
    private $member_id;
    private $member_name;
    public function __construct($member_id, $member_name) {
        $this->set_member_id($member_id);
        $this->set_member_name($member_name);
    }

    // member id property
    protected function set_member_id($member_id) {
        $this->member_id = $member_id;
    }

    // member name property
    protected function set_member_name($member_name) {
        $this->member_name = $member_name;
    }

    // set the member ID and name
    protected static function find_member($member_id) {
        // check member ID before logging in
        $connection = self::connect();
        // we are using prepared statements for security, hence the :
        $statement = "select * from members where member_id = :member_id";
        // prepare the statement
        $prepared_statement = $connection->prepare($statement);
        $prepared_statement->bindParam(":member_id", $member_id);
        $prepared_statement->execute();
        // check that the memeber id exists
        return $prepared_statement->fetch(PDO::FETCH_ASSOC);
    }
}
