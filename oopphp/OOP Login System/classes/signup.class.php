<?php

class Signup extends Dbh {

    protected function set_user($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare("insert into users (users_uid, users_pwd, users_email) values (?, ?, ?);");

        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashed_pwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function check_user($uid, $email) {
        $stmt = $this->connect()->prepare("select users_uid from users where users_uid = ? or users_email = ?;");

        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0) {
            $result_check = false;
        } else {
            $result_check = true;
        }

        return $result_check;
    }
}