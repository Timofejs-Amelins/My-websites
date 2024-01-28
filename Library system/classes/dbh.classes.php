<?php

class DatabaseConnection {
    // class for connecting to database - all classes rely on this

    // set write-once attributes - you cannot change them after
    private $host;
    private $user;
    private $password;

    // construct the database connection
    public function __construct($host, $user, $password) {
        $this->set_host($host);
        $this->set_user($user);
        $this->set_password($password);
    }

    private function get_host() {
        return $this->host;
    }

    // set the host
    private function set_host($host) {
        $this->host = $host;
    }

    private function get_user() {
        return $this->user;
    }

    // set the user
    private function set_user($user) {
        $this->user = $user;
    }

    private function get_password() {
        return $this->password;
    }

    // set the password
    private function set_password($password) {
        $this->password = $password;
    }

    // now connect to database
    protected function connect() {
        // create connection and set attributes
        $connection = new PDO($this->get_host(), $this->get_user(), $this->get_password());
        // throw PDO exceptions if there are PDO errors
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}
