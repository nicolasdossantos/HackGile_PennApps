<?php

class member
{
<<<<<<< HEAD
    public $name;
    public $email;

    public function __construct($args = []) {
        $this->name = $args['name'] ?? '';
        $this->email = $args['email'] ?? '';
    }

    public function deleteMember() {
        unset($this);
=======
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
        return $this->fname . " " . $this->lname;
    }

    public function getAssociatedProjects(){
        return [project::get_default_project1()];
    }

    public static function GetDefaultMember1(){
        $args = array(
            "email" => "ndefilippis98@gmail.com",
            "fname" => "Nick",
            "lname" => "DeFilippis");
        return new Member($args);
    }

    public static function GetDefaultMember2(){
        $args = array(
            "email" => "tuf92449@temple.edu",
            "fname" => "Nicolas",
            "lname" => "Dos Santos");
        return new Member($args);
    }

    public static function GetDefaultMember3(){
        $args = array(
            "email" => "tchin25@gmail.com",
            "fname" => "Thomas",
            "lname" => "Chin");
        return new Member($args);
>>>>>>> ff75ed50646c96d5aa247a54662054829a282273
    }
}