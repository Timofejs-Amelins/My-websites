<?php
// include the member model
include "member.classes.php";

class MemberContr extends Member {
    public static function login($member_id) {
        // grab the data from the member database
        $row = self::find_member($member_id);

        // return false if the row is empty
        if (empty($row)) {
            echo "Login failed";
        } else {
            self::set_member_id($member_id);
            // get the member name from the row returned
            self::set_member_name($row["member_name"]);
        }
    }
}
