<?php

class member extends Database
{
    static protected $table_name = 'members';
    static protected $db_columns = ['id','email', 'first_name', 'last_name', 'is_admin'];
    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $is_admin;

    public function __construct($args = [])
    {
        $this->email = $args['email'] ?? '';
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->is_admin = $args['is_admin'??false];
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFullName()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getAssociatedProjects()
    {
        return [project::get_default_project1()];
    }

    public static function GetDefaultMember1()
    {
        $args = array(
            "email" => "ndefilippis98@gmail.com",
            "first_name" => "Nick",
            "last_name" => "DeFilippis",
            "is_admin" =>true);

        return new Member($args);
    }

    public static function GetDefaultMember2()
    {
        $args = array(
            "email" => "tuh36069@temple.edu",
            "first_name" => "Nicolas",
            "last_name" => "Dos Santos",
            "is_admin" =>true);
        return new Member($args);

    }

    public static function GetDefaultMember3()
    {
        $args = array(
            "email" => "tchin25@gmail.com",
            "first_name" => "Thomas",
            "last_name" => "Chin",
            "is_admin" =>true);
        return new Member($args);
    }

    //Rewrite it
    public function deleteMember($member)
    {
        $member->email = '';
        $member->fname = '';
        $member->lname = '';
    }
}