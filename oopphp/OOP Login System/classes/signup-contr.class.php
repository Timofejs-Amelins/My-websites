<?php

class SignupContr extends Signup{

    private $uid;
    private $pwd;
    private $pwd_repeat;
    private $email;

    public function __construct($uid, $pwd, $pwd_repeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwd_repeat = $pwd_repeat;
        $this->email = $email;
    }

    public function signup_user() {
        if($this->empty_input() == false) {
            // Echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalid_uid() == false) {
            // Echo "Invalid username!";
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalid_email() == false) {
            // Echo "Invalid email!";
            header("location: ../index.php?error=email");
            echo $this->email;
            echo !filter_var($this->email, FILTER_VALIDATE_EMAIL);
            exit();
        }
        if($this->pwd_match() == false)
        {
            // echo "Passwords don't match!";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->uid_taken_check() == false)
        {
            // echo "Username or email taken!";
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->set_user($this->uid, $this->pwd, $this->email);
    }

    private function empty_input() {
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwd_repeat) || empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalid_uid() {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function invalid_email() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
        {
            $result = false;          
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function pwd_match() {
        if ($this->pwd !== $this->pwd_repeat)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function uid_taken_check() {
        if (!$this->check_user($this->uid, $this->email))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
}