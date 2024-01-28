<?php

class UsersView extends Users {

    public function show_user($name) {
        $results = $this->get_user($name);
        echo "Full name: " . $results[0]["users_firstname"] . " " . $results[0]["users_lastname"] . "<br>";
        echo "Date of birth: " . $results[0]["users_dateofbirth"];

    }

}