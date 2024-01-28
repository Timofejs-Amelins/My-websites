<?php

class UsersContr extends Users {

    public function create_user($firstname, $lastname, $dob) {
        $this->set_user($firstname, $lastname, $dob);
    }

}