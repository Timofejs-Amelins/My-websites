<?php

class Users extends Dbh {

    protected function get_user($name) {
        $sql = "select * from users where users_firstname = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function set_user($firstname, $lastname, $dob) {
        $sql = "insert into users(users_firstname, users_lastname, users_dateofbirth) values (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname, $lastname, $dob]);
    }

}