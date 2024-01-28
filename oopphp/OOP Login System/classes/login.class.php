<?php

class Login extends Dbh {

    protected function get_user($uid, $pwd) {
        $stmt = $this->connect()->prepare("select users_pwd from users where users_uid = ? or users_email = ?;");

        if(!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
        }

        $pwd_hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $check_pwd = password_verify($pwd, $pwd_hashed[0]["users_pwd"]);

        if($check_pwd == false) 
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
        }
        elseif($check_pwd == true) {
            $stmt = $this->connect()->prepare("select users_pwd from users where users_uid = ? or users_email = ?; and users_pwd = ?;");

            if(!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0)
            {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];

            $stmt = null;
        }

        $stmt = null;
    }

}