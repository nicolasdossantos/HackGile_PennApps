<?php

class member
{
    protected $email;
    protected $fname;
    protected $lname;

    public function __construct($args=[]) {
        $this->email = $args['email'] ?? '';
        $this->fname = $args['fname'] ?? '';
        $this->lname = $args['lname'] ?? '';
    }

    public function getEmail(){
        return $this->email;
    }

    public function getFullName(){
        return $this->fname . $this->lname;
    }


    public static function GetDefaultMember1(){
        $args = ["ndefilippis98@gmail.com", "Nick", "DeFilippis"];
        return new Member($args);
    }

    public static function GetDefaultMember2(){
        $args = ["tuf92449@temple.edu", "Nicolas", "Dos Santos"];
        return new Member($args);
    }

    public static function GetDefaultMember3(){
        $args = ["tchin25@gmail.com", "Thomas", "Chin"];
        return new Member($args);
    }
}