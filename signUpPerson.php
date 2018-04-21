<?php

class Person{
    public $userName;
    public $email;
    public $password;

    public function __construct ($userName, $email, $password){
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
    }

}

$person1 = new Person($_POST["userName"], $_POST["email"], $_POST["password"]);

var_dump($person1);