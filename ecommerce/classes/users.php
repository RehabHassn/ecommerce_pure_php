<?php

class Users{

    // properties

    /* modifiers -->
    public : accessed any where inside or outside the class
    private : accessed only inside the class
    protected: accessed inside the class or inside the classes that inherit from it

    if we didn't initialize modifier the default is public
    */
    protected $username;

    private $email;

    // methods

    public function __construct($username,$email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function getUserName()
    {
        echo 'username---> '.$this->username.'<br>';
    }

    public function getEmail()
    {
        echo 'email---> '.$this->email.'<br>';
    }
}