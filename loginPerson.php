<?php

class Person{
    public $userName;
    public $password;

    public function __construct ($userName, $password){
        $this->userName = $userName;
        $this->password = $password;
    }

}

$person1 = new Person($_POST["userName"], $_POST["password"]);

var_dump($person1);